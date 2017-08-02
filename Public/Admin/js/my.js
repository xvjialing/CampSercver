$(function() {
	$('#container').highcharts({
		chart: {
			type: ''
		},
		title: {
			text: '近12个月每月各营地营业额'
		},
		credits: {
			text: ''
		},
		xAxis: {
			
			labels: {
				//align : 'center',
				rotation: 90,
				//staggerLines: 2,
				//step : 2,
				style: {
					color: '#6D869F',
					fontWeight: 'bold'
				}
			},
			categories: ['2015年3月', '2015年4月', '2015年5月', '2015年6月', '2015年7月', '2015年8月', '2015年9月', '2015年10月', '2015年11月', '2015年12月', '2016年1月', '2016年2月'],
			
			
		},
		yAxis: {
			min: 0,
			title: {
				text: '总销售额/万元'
			}
		},
		tooltip: {
		
			formatter: function() {
									
				return '<b>'+ this.x +'</b><br/>'+
					this.series.name +': '+ this.y +'<br/>'
					//+'Total: '+ this.point.stackTotal;
				
			}
		},
		plotOptions: {
			column: {
				//stacking: 'normal',
				pointPadding: 0,
				borderWidth: 0
			}
		},
		series: [{
			name: '营地一',
			type: 'column',
			color: '#87cefa',
			data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

		},
		{
			name: '营地二',
			type: 'column',
			color: '#ff7f50',
			data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

		},{
			name: '营地一',
			type: 'line',
			color: '#87cefa',
			//linkedTo : 'previous',
			data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

		},{
			name: '营地二',
			type: 'line',
			color: '#ff7f50',
			//linkedTo : 'previous',
			data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

		}]
	});
});