import Panzoom from '@panzoom/panzoom'
//import Panzoom from './panzoom.js'

var pZooms = {
	timer: null,
	els: document.querySelectorAll('.map-container'),
	main: document.querySelector('#lokalizacja'),
	//mapHalf: document.querySelector('#lokalizacja .map--half'),
	init: function() {
		if (pZooms.els.length) {
			pZooms.els.forEach(el => {
				
				el.mapWrapper = el.querySelector('.map-wrapper');
				el.map = el.querySelector('.map');
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
							animate: true, //true,
							duration: 150
							//transition:false
					});
					
					// btn: zoom-in
					el.mapCanZoom = true;
					el.mapBtnZoomIn = el.querySelector('.zoom-in');
					if (el.mapBtnZoomIn) {
						el.mapBtnZoomIn.addEventListener('click', function(e) {
							if (el.mapCanZoom) {
								//el.mapPanZoom.zoomIn();
								let panOpt = el.mapPanZoom.getOptions();
								let zoomTo = el.mapPanZoom.getScale() + panOpt.step;
								if (zoomTo > panOpt.maxScale) {
									//zoomTo = panOpt.maxScale;
									zoomTo = el.mapPanZoom.getScale();
								}
								
//console.log(zoomTo, panOpt);
								//el.mapWrapper.classList.add('is-zooming');
								el.mapPanZoom.zoom(zoomTo, {force: false});
								
								el.mapCanZoom = false;
								setTimeout(function() {
									el.mapCanZoom = true;
									//el.mapWrapper.classList.remove('is-zooming');
									//pZooms.zoomChanged(el);
								}, 200);
							} // endif: can zoom
						});
					}
					
					// el.mapWrapper.addEventListener('panzoomend', (event) => {
						// clearTimeout(pZooms.timer_panzoomend);
						// pZooms.timer_panzoomend = setTimeout(function() {
							// //pZooms.update(el);
							// console.log('end');
						// }, 400);
					// })	
					
					// btn: zoom out
					el.mapBtnZoomOut = el.querySelector('.zoom-out');
					if (el.mapBtnZoomOut) {
						el.mapBtnZoomOut.addEventListener('click', function(e) {
							if (el.mapCanZoom) {
								//el.mapPanZoom.zoomOut();
								let panOpt = el.mapPanZoom.getOptions();
								let zoomTo = el.mapPanZoom.getScale() - panOpt.step;	
								if (zoomTo < panOpt.minScale) {
									//zoomTo = panOpt.minScale;
									zoomTo = el.mapPanZoom.getScale();
								}
								
//console.log(zoomTo, panOpt);
								//el.mapWrapper.classList.add('is-zooming');
								el.mapPanZoom.zoom(zoomTo, {force: false});

								el.mapCanZoom = false;
								setTimeout(function() {
									el.mapCanZoom = true;
									//el.mapWrapper.classList.remove('is-zooming');
									//pZooms.zoomChanged(el);
								}, 200);
							} // endif: can zoom
						});
					}
					
					// btns: fullscreen
					el.mapBtnFullScreen = el.querySelector('.full-screen');
					if (el.mapBtnFullScreen) {
						el.mapBtnFullScreen.addEventListener('click', function(e) {
							document.body.classList.toggle('is-map-full-screen-mode');
							
							el.classList.toggle('map-full-screen-mode');
							document.body.classList.toggle('body-map-full-screen-mode');
							
							if (el.classList.contains('map-full-screen-mode')) {
								//el.mapPanZoom.zoom(1, {animate: false, force: false});	
								if (pZooms.els.length) {
									pZooms.els.forEach(elm => {
										elm.mapPanZoom.zoom(1, {animate: false, force: false});	
									})
								}								
							} else {
								//pZooms.update(el);
								if (pZooms.els.length) {
									pZooms.els.forEach(elm => {
										elm.mapPanZoom.zoom(elm.mapPanZoom.getScale(), { animate: false });
									})
								}		
							}
							
							//console.log('z');
							//pZooms.update(el);
							//panzoom.zoomIn({ animate: false });
							//panzoom.zoomOut({ animate: false });
						});
					}
				
				
				} // endif: map-wrapper
				
			}); // endforeach
			
			// resize
			window.addEventListener('resize', function() {
        pZooms.updateAll();
			});
			
			// esc
			document.addEventListener('keydown', function(e) {
				if(e.keyCode == 27){
					//add your code here
					pZooms.fullScreenCloseAll();
				}
			});
			
			pZooms.setFullScreenCssContentWidth();
			addEventListener('resize', pZooms.setFullScreenCssContentWidth);
			addEventListener('orientationchange', pZooms.setFullScreenCssContentWidth);
		
		}
	},
	setFullScreenCssContentWidth: function() {
//console.log(pZooms.main.clientWidth); 
		if (pZooms.main) {
			document.documentElement.style.setProperty('--mainContainerWidth', pZooms.main.clientWidth + 'px');
			// if (pZooms.mapHalf) {
				// let pChange = Math.floor(pZooms.main.clientWidth/pZooms.mapHalf.clientWidth * 100);
				// document.documentElement.style.setProperty('--mainContainerWidthProcentChange',  pChange + '%');
			// }
		}
	},
	fullScreenCloseAll: function() {

		document.body.classList.remove('is-map-full-screen-mode');
		
		if (pZooms.els.length) {
			pZooms.els.forEach(el => {
				el.classList.remove('map-full-screen-mode');
			})
		}
		
		pZooms.updateAll();
	},
	// zoomChanged: function(el) {
		
		// let panOpt = el.mapPanZoom.getOptions();
		// let zoomToMin = el.mapPanZoom.getScale() - panOpt.step;
		// let zoomToMax = el.mapPanZoom.getScale() + panOpt.step;
			
		// // out
		// if (zoomToMin < panOpt.minScale) {
			// el.mapBtnZoomOut.classList.add('zoom-disabled');
		// } else {
			// el.mapBtnZoomOut.classList.remove('zoom-disabled');
		// }
		
		// // in
		// if (zoomToMax > panOpt.maxScale) {
			// el.mapBtnZoomIn.classList.add('zoom-disabled');
		// } else {
			// el.mapBtnZoomIn.classList.remove('zoom-disabled');
		// }
								
	// },
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