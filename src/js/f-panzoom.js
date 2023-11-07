import Panzoom from '@panzoom/panzoom'


var pZooms = {
	timer: null,
	els: document.querySelectorAll('.zoom-container'),

	init: function() {
		if (pZooms.els.length) {
			pZooms.els.forEach(el => {
				
				el.mapWrapper = el.querySelector('.zoom-wrapper');
				el.map = el.querySelector('.zoom-img');
				if (el.mapWrapper) {
					
					let xScalePos = el.map.dataset.x / el.mapWrapper.getBoundingClientRect().width;
					let yScalePos = el.map.dataset.y / el.mapWrapper.getBoundingClientRect().height;
				
					el.mapPanZoom = Panzoom(el.mapWrapper, {
							contain: 'outside',
							startScale: el.map.dataset.zoom_start || 1,
							maxScale: el.map.dataset.zoom_max || 3,
							
							startX:	el.mapWrapper.clientWidth * xScalePos,
							startY:	el.mapWrapper.clientHeight * yScalePos,
							step: 1,
							animate: true,
							duration: 150
					});
					
					// btn: zoom-in
					el.mapCanZoom = true;
					el.mapBtnZoomIn = el.querySelector('.zoom-in');
					if (el.mapBtnZoomIn) {
						el.mapBtnZoomIn.addEventListener('click', function(e) {
							if (el.mapCanZoom) {
								let panOpt = el.mapPanZoom.getOptions();
								let zoomTo = el.mapPanZoom.getScale() + panOpt.step;

								if (zoomTo > panOpt.maxScale) {
									zoomTo = el.mapPanZoom.getScale();
								}
								
								el.mapPanZoom.zoom(zoomTo, {force: false});
								
								el.mapCanZoom = false;
								setTimeout(function() {
									el.mapCanZoom = true;
								}, 200);
							}
						});
					}
					
					// btn: zoom out
					el.mapBtnZoomOut = el.querySelector('.zoom-out');
					if (el.mapBtnZoomOut) {
						el.mapBtnZoomOut.addEventListener('click', function(e) {
							if (el.mapCanZoom) {
								let panOpt = el.mapPanZoom.getOptions();
								let zoomTo = el.mapPanZoom.getScale() - panOpt.step;	
								if (zoomTo < panOpt.minScale) {
									zoomTo = el.mapPanZoom.getScale();
								}

								el.mapPanZoom.zoom(zoomTo, {force: false});

								el.mapCanZoom = false;
								setTimeout(function() {
									el.mapCanZoom = true;
								}, 200);
							}
						});
					}
	
				}
				
			});
			
			// resize
			window.addEventListener('resize', function() {
        		pZooms.updateAll();
			});
		}
	},

	update: function(el) {
		el.mapPanZoom.zoom(el.mapPanZoom.getScale(), { animate: false });
	},

	updateAll: function() {
		clearTimeout(pZooms.timer);
		pZooms.timer = setTimeout(function() {
			
			if (pZooms.els.length) {
				pZooms.els.forEach(el => {
					pZooms.update(el);
				})
			}
			
		}, 60);
	}
}
export default pZooms;