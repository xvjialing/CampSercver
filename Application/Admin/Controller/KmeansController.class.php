<?php
	require_once("util.php");

	abstract class AbstractGen{
		    public abstract function generateData();
		}
	
		class SeparateNormalGen extends AbstractGen{
			    protected $myNumPoints;
			    protected $myNumCenters;
			    protected $myNumDims;
			    protected $myCenterRange;
			    protected $myClusterStdDev;
		
			    public function __construct($numPoints, $numCenters, $numDims,
					                                $centerRange, $clusterStdDev){
			        $this->myNumPoints = $numPoints;
				    $this->myNumCenters = $numCenters;
				    $this->myNumDims = $numDims;
				    $this->myCenterRange = $centerRange;
		            $this->myClusterStdDev = $clusterStdDev;
				    }
			
				    public function generateData(){
					        $data = array();
					        $realCenters = array();
					        for($i = 0; $i < $this->myNumCenters; $i++){
						            $normCenter =
						                getRandomPoint($this->myNumDims) * $this->myCenterRange;
						            $realCenters[] = $normCenter;
						            for($j = 0; $j < $this->myNumPoints / $this->myNumCenters; $j++){
							                $data[] = getByNormDist($normCenter, $this->myClusterStdDev);
							            }
							        }
							        // Report general info about the data set
							        echo "SEPARATE NORMAL DISTRIBUTIONS\n";
							        echo "=============================\n";
							        echo "Number of points: " . $this->myNumPoints . "\n";
							        echo "Number of centers: " . $this->$myNumCenters . "\n";
							        echo "Number of dimensions: ". $this->myNumDims . "\n";
							        echo "Cluster center range in each dimension: " . $this->myCenterRange . "\n";
						        echo "Intra-cluster standard deviation: " . $this->$myClusterStdDev . "\n";
							        echo "\"Real\" potential: " . getKMeansPotential($data, $realCenters) . "\n";
							        return $data;
							    }
							}
						
							class UniformGen extends AbstractGen{
								    protected $myNumPoints;
								    protected $myNumDims;
								    protected $myRange;
							
								    public function __construct($numPoints, $numDims, $range){
									        $this->myNumPoints = $numPoints;
									        $this->myNumDims = $numDims;
									        $this->myRange = $range;
									    }
								
									    public function generateData(){
										        $data = array();
										        for($i = 0; $i < $this->myNumPoints; $i++){
											            $data[] = getRandomPoint($this->myNumDims) * $this->myRange;
											        }
										
											        // Report general info about the data set
											        echo "UNIFORMLY RANDOM DATA\n";
											        echo "=====================\n";
											        echo "Number of points: " . $this->myNumPoints . "\n";
											        echo "Number of dimensions: " . $this->myNumDims . "\n";
											        echo "Range in each dimension: " . $this->myRange . "\n";
											        return $data;
											    }
											}
										
											class ReadFileGen extends AbstractGen{
												    protected $myFilename;
											
												    public function __construct($filename){
													        $this->myFilename = $filename;
													    }
												
													    public function generateData(){
														        $file = file($this->myFilename);
													
														        $data = array();
														        $fileComments = array();
														        $expDim = -1;
														        $word = "";
														        foreach($file as $lineNumber => $line){
															            $line = trim($line);
															            if(empty($line)){
																                continue;
																            }
																            $wordList = split('[ \t]+', $line);
															            if(empty($wordList)){
																                continue;
																	            }
																	            if(preg_match('/^\/\//', $line)){
																		                $fileComments[] = $line;
																		                continue;
																		            }
																	
																		            $scalars = array();
																		            foreach($wordList as $word){
																			                if(is_float((float)$word) == false){
																				                    throw new Exception("Badly formatted point at line " . $lineNumber . " of data file \"" . $this->myFilename . "\".");
																				                }
																				                $scalars[] = $word;
																				            }
																			
																				            $expDim = count($scalars);
																				            $data[] = new Point($scalars);
																				        }
																				        if(empty($data)){
																					            throw new Exception("Data file" . $this->myFilename . " contains no points.");
																					        }
																					        // Report general info about the data set
																					        $title = "DATA FROM FILE \"" . $this->myFilename . "\"";
																				
																					        echo "$title\n";
																					        for ($i = 0; $i < strlen($title); $i++){
																						            echo "=";
																						        }
																						        echo "\n\n";
																						        echo "Number of points: " . count($data) . "\n";
																						        echo "Number of dimensions: " . $expDim . "\n";
																						        echo "Comments in file: \n";
																						        foreach($fileComments as $comment){
																							            echo $comment . "\n";
																							        }
																							        return $data;
																							    }
																							}
																						
																						
																							///////////////////////////
																						// CLUSTERING ALGORITHMS //
																							///////////////////////////
																						
																						/**
																							 * A clustering algorithm.
																							 **/
																						abstract class AbstractClusterer {
																								    abstract public function getName();
																								    abstract public function initClustering($data, $numCenters);
																								    abstract public function doClustering($data, $clustering, $numIterations);
																								}
																							
																								/**
																								 * The awful pick random centers and stop algorithm.
																								 **/
																								class UniformRandomClusterer extends AbstractClusterer {
																									    public function getName() {
																										        return "TRIVIAL RANDOM CLUSTERER";
																										    }
																										    public function initClustering($data, $numCenters){
																											        return chooseUniformCenters($data, $numCenters);
																											    }
																										    public function doClustering($data, $clustering, $numIterations){
																												        return $clustering;
																												    }
																												}
																											
																												/**
																												 * K-means with uniform clustering.
																												 **/
																												class UniformKMeans extends AbstractClusterer {
																												    public function getName() {
																														        return "K-MEANS WITH UNIFORM SEEDING";
																													    }
																													    public function initClustering($data, $numCenters){
																														        return chooseUniformCenters($data, $numCenters);
																															    }
																														    public function doClustering($data, $clustering, $numIterations){
																															        return runKMeans($data, $clustering, $numIterations);
																															   }
																															}
																															
																															/**
																															 * K-means with smart clustering, no retries at each stage.
																															 **/
																															class SmartKMeans extends AbstractClusterer {
																																   public function getName() {
																																	       return "K-MEANS++";
																																	   }
																																	  public function initClustering($data, $numCenters){
																																		       return chooseSmartCenters($data, $numCenters, 1);
																																		   }
																																		   public function doClustering($data, $clustering, $numIterations){
																																			       return runKMeans($data, $clustering, $numIterations);
																																			   }
																																				};
																																			
																																			/**
																																				 * K-means with smart clustering, no retries at each stage.
																																				 **/
																																				class SmartKMeansSeedingOnly extends AbstractClusterer {
																																					    public function getName() {
																																					        return "K-MEANS++ CUTOFF";
																																					   }
																																					  public function initClustering($data, $numCenters){
																																						        return chooseSmartCenters($data, $numCenters, 1);
																																						    }
																																						    public function doClustering($data, $clustering, $numIterations){
																																						       $result = $clustering;
																																							       if ($numIterations > 0) {
																																								          $temp = 1;
																																								         $result = runKMeans($data, $clustering, $temp);
																																								           $numIterations = $numIterations - 1 + $temp;
																																								      }
																																								       return $result;
																																								   }
																																								}
																																								
																																								/**
																																								 * K-means with smart clustering, log(k) retries at each stage.
																																								 **/
																																								class SmartKMeansRetries extends AbstractClusterer {
																																									   public function getName() {
																																										       return "K-MEANS++ WITH RETRIES DURING SEEDING";
																																										   }
																																										   public function initClustering($data, $numCenters){
																																											        return chooseSmartCenters($data, $numCenters,
																																												                                2 + (int)log($numCenters));
																																										   }
																																										   public function doClustering($data, $clustering, $numIterations){
																																												      return runKMeans($data, $clustering, $numIterations);
																																												  }
																																												}
																																												
																																												//////////////////
																																												// TESTING CODE //
																																												//////////////////
																																											
																																												class Main{
																																												   public function testClusteringMethod($clusterer, $data,
																																														                                        $numClusters, $numTrials,
																																														                                       $numIterations, $measurementInterval){
																																													        if($numIterations % $measurementInterval !== 0){
																																															          throw new Exception("Illegal Argument");
																																															        }
																																															
																																															       echo "TESTING "  . $clusterer->getName() . "...\n";
																																															       $title = "RUNNING . " . $clusterer->getName() . ", looking for " .
																																																	            $numClusters . " clusters";
																																														       echo $title . "\n";
																																															        for ($i = 0; $i < strlen($title); $i++){
																																																          echo "=";
																																																       }
																																																       echo "\n";
																																																
																																																       // Set everything up
																																																       $measuredPotential = array();
																																																     $trialPotential = array();
																																															       $trialTime = array();
																																																        if ($measurementInterval == -1){
																																																	            $measurementInterval = $numIterations;
																																																	       }
																																																	      $bestMeasuredPotential = -1;
																																																	        $maxTrialTime = 0;
																																																	       $totalTrialTime = 0;
																																																	       $maxTrialPot = 0;
																																																	        $totalTrialPot = 0;
																																																	       $minTrialTime = 1e20;
																																																       $minTrialPot = 1e20;
																																																      $curTrial = 0;
																																																        $curIteration = 0;
																																																	        $startTime = 0;
																																																	       $bonusTime = 0;
																																																	
																																																	       // Iterate as necessary
																																																	        $thisClustering = array();
																																																       while ($curIteration < $numIterations || $curTrial < $numTrials) {
																																																	            $stepSize = $measurementInterval;
																																																	
																																																		            // Iterate stepSize iterations
																																																	           do {
																																																		               // Initialize the clustering if appropriate
																																																		               if (count($thisClustering) == 0) {
																																																			                   $startTime = getTime();
																																																			                  $bonusTime = 0;
																																																			                  $thisClustering =
																																																			                      $clusterer->initClustering($data, $numClusters);
																																																			                $stepSize--;
																																																				               }
																																																				
																																																				               // Do the clustering if appropriate
																																																			             if ($stepSize > 0) {
																																																				                   $thisClustering =
																																																					                       $clusterer->doClustering($data, $thisClustering,
																																																						                                              $stepSize);
																																																				              }
																																																				
																																																				              // Update our best results
																																																					              $tempStartTime = getTime();
																																																				               $thisPotential = getKMeansPotential($data, $thisClustering);
																																																				               $bonusTime += (getTime() - $tempStartTime);
																																																					               if($curIteration < $numIterations &&
																																																				                  ($bestMeasuredPotential < 0 ||
																																																						                   $thisPotential < $bestMeasuredPotential)){
																																																					                   $bestMeasuredPotential = $thisPotential;
																																																					              }
																																																					
																																																						             // Reset the clustering if appropriate,
																																																					               // and instrument this clustering trial
																																																						            if ($stepSize != 0) {
																																																						                  $thisTime = (getTime() - $startTime) - $bonusTime;
																																																							                 if ($curTrial < $numTrials) {
																																																								                     $minTrialPot = min($thisPotential, $minTrialPot);
																																																								                      $maxTrialPot = max($thisPotential, $maxTrialPot);
																																																								                      $totalTrialPot += $thisPotential;
																																																							                      $minTrialTime = min($thisTime, $minTrialTime);
																																																								                      $maxTrialTime = max($thisTime, $maxTrialTime);
																																																								                     $totalTrialTime += $thisTime;
																																																							                     $curTrial++;
																																																							                      echo "Completed trial " . $curTrial . " of " . $numTrials .
																																																							                          " (potential = " . $thisPotential .
																																																								                           ", time = " . $thisTime . ")...\n";
																																																								                       $trialPotential[] = $thisPotential;
																																																								                      $trialTime[] = $thisTime;
																																																								                  }
																																																							                   $thisClustering = array();
																																																								                }
																																																							            } while ($stepSize > 0);
																																																							
																																																								           // Instrument the iteration data
																																																								            if ($curIteration < $numIterations) {
																																																								               $measuredPotential[] = $bestMeasuredPotential;
																																																								               $curIteration += $measurementInterval;
																																																								                echo "Completed iteration " . $curIteration . " of " .
																																																											                   $numIterations . " (potential = " .
																																																											                   $bestMeasuredPotential . ")...\n";
																																																									           }
																																																								       }
																																																									
																																																									       // Output the summary over all trials
																																																									        echo "Potential average by trial: " .
																																																								            ($totalTrialPot / $numTrials) . "\n";
																																																									       echo "Potential range by trial: $minTrialPot to $maxTrialPot\n";
																																																									       echo "Time average by trial: " . ($totalTrialTime / $numTrials) .
																																																								           " seconds\n";
																																																									        echo "Time range by trial: $minTrialTime to $maxTrialTime seconds\n\n";
																																																								
																																																								      // Output the information for each trial
																																																								       for ($i = 0; $i < $numTrials; $i++){
																																																										          echo "Trial " . ($i+1) . " of $numTrials: " .
																																																										                $trialPotential[$i] . " potential, " .
																																																									               $trialTime[$i] . " seconds.\n";
																																																									       }
																																																										      echo "\n";
																																																										
																																																									       // Output the information for each iteration
																																																									      for ($i = 0; $i < $numIterations/$measurementInterval; $i++){
																																																										          echo "Potential after " .
																																																												               ($i+1)*$measurementInterval . " iterations: " .
																																																												               $measuredPotential[$i] . "\n";
																																																										     }
																																																										       echo "\n";
																																																									    }
																																																											
																																																										  /**
																																																											    * Generates data according to the given method,
																																																										    * and then sees how various clustering
																																																										    * algorithms perform on the data according to
																																																										     * the k-means potential. Data is aggregated
																																																										   * according to potential after a certain number of iterations.
																																																										    **/
																																																										   public function testAllMethods($logFilename, $dataGen,
																																																													                                          $numClusters) {
																																																											        static $numTrials = 10;
																																																											        static $numIterations = 20;
																																																												        static $measurementInterval = 5;
																																																											
																																																											        // Open the log file
																																																											        echo "Outputting this test case to log file: \"$logFilename\".\n";
																																																												
																																																											      // Generate the inputs
																																																												        echo "Generating data...\n";
																																																												        $data = $dataGen->generateData();
																																																												
																																																												        // Run the algorithms
																																																												        //$this->testClusteringMethod(new UniformRandomClusterer(),
																																																											        //$data, $numClusters, $numTrials,
																																																													        //$numIterations, $measurementInterval);
																																																												        $this->testClusteringMethod(new UniformKMeans(),
																																																													                                    $data, $numClusters, $numTrials,
																																																														                                    $numIterations, $measurementInterval);
																																																													        $this->testClusteringMethod(new SmartKMeans(),
																																																														                                    $data, $numClusters, $numTrials,
																																																													                                    $numIterations, $measurementInterval);
																																																												        $this->testClusteringMethod(new SmartKMeansRetries(),
																																																														                                $data, $numClusters, $numTrials,
																																																													                                    $numIterations, $measurementInterval);
																																																											       $this->testClusteringMethod(new SmartKMeansSeedingOnly(),
																																																													                                    $data, $numClusters, $numTrials,
																																																												                                   $numIterations, $measurementInterval);
																																																											   }
																																																												
																																																												    /**
																																																											    * Runs a test case of our choice.
																																																												     **/
																																																												    public static function exec() {
																																																													        $main = new Main();
																																																												        //$main->testAllMethods("norm10(10).txt", new SeparateNormalGen(10000, 10, 5, 10, 1), 10);
																																																												       //$main->Testallmethods("norm10(25).txt", new SeparateNormalGen(10000, 10, 5, 10, 1), 25);
																																																													       //$main->testAllMethods("norm10(50).txt", new SeparateNormalGen(10000, 10, 5, 10, 1), 50);
																																																													        //$main->testAllMethods("norm25(10).txt", new SeparateNormalGen(10000, 25, 15, 500, 1), 10);
																																																													       //$main->testAllMethods("norm25(25).txt", new SeparateNormalGen(10000, 25, 15, 500, 1), 25);
																																																													       //$main->testAllMethods("norm25(50).txt", new SeparateNormalGen(10000, 25, 15, 500, 1), 50);
																																																												       //$main->testAllMethods("cloud(10).txt", new ReadFileGen("cloud_input.txt"), 10);
																																																														        //$main->testAllMethods("cloud(25).txt", new ReadFileGen("cloud_input.txt"), 25);
																																																													        //$main->testAllMethods("cloud(50).txt", new ReadFileGen("cloud_input.txt"), 50);
																																																												       //$main->testAllMethods("intrusion(10).txt", new ReadFileGen("intrusion_input.txt"), 10);
																																																												       //$main->testAllMethods("intrusion(25).txt", new ReadFileGen("intrusion_input.txt"), 25);
																																																												       //$main->testAllMethods("intrusion(50).txt", new ReadFileGen("intrusion_input.txt"), 50);
																																																													        //$main->testAllMethods("spam(10).txt", new ReadFileGen("spam_input.txt"), 10);
																																																													        //$main->testAllMethods("spam(25).txt", new ReadFileGen("spam_input.txt"), 25);
																																																													       //$main->testAllMethods("spam(50).txt", new ReadFileGen("spam_input.txt"), 50);
																																																													        //$main->testAllMethods("test(10).txt", new ReadFileGen("test2.txt"), 10);
																																																													       $main->testAllMethods("test2(10).txt", new ReadFileGen("data.txt"), 10);
																																																													       //$main->testAllMethods("test(10).txt", new ReadFileGen("test2.txt"), 10);
																																																												
																																																													       //http://kdd.ics.uci.edu/databases/ipums/ipums.html
																																																												        return 0;
																																																												    }
																																																												}
																																																												
																																																													Main::exec();
429	?>