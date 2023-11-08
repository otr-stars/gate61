import Panzoom from '@panzoom/panzoom'
//import Panzoom from './panzoom.js'

// https://github.com/timmywil/panzoom

var pZoomsH = {
    timer: null,
    els: document.querySelectorAll('.levels .zoom-container'),
    init: function () {
        if (pZoomsH.els.length) {
            pZoomsH.els.forEach(el => {

                el.mapWrapper = el.querySelector('.map-wrapper');
                el.map = el.querySelector('.map');
                if (el.mapWrapper) {

                    let centerX = (el.mapWrapper.clientWidth - el.getBoundingClientRect().width) / 2;
                    let centerY = (el.mapWrapper.clientHeight - el.getBoundingClientRect().height) / 2;

                    el.mapPanZoom = Panzoom(el.mapWrapper, {
                        // disableYAxis: true,
                        contain: 'outside',
                        startScale: 1,
                        maxScale: el.map.dataset.zoom_max || 3,

                        startX: centerX,
                        startY: centerY,

                        animate: false,
                        duration: 150
                        //transition: false
                    });
                    // btn: zoom-in
                    el.mapCanZoom = true;
                    el.mapBtnZoomIn = el.querySelector('.zoom-in');
                    if (el.mapBtnZoomIn) {
                        el.mapBtnZoomIn.addEventListener('click', function (e) {
                            if (el.mapCanZoom) {
                                let panOpt = el.mapPanZoom.getOptions();
                                let zoomTo = el.mapPanZoom.getScale() + panOpt.step;

                                if (zoomTo > panOpt.maxScale) {
                                    zoomTo = el.mapPanZoom.getScale();
                                }

                                el.mapPanZoom.zoom(zoomTo, { force: false });

                                el.mapCanZoom = false;
                                setTimeout(function () {
                                    el.mapCanZoom = true;
                                }, 200);
                            }
                        });
                    }

                    // btn: zoom out
                    el.mapBtnZoomOut = el.querySelector('.zoom-out');
                    if (el.mapBtnZoomOut) {
                        el.mapBtnZoomOut.addEventListener('click', function (e) {
                            if (el.mapCanZoom) {
                                let panOpt = el.mapPanZoom.getOptions();
                                let zoomTo = el.mapPanZoom.getScale() - panOpt.step;
                                if (zoomTo < panOpt.minScale) {
                                    zoomTo = el.mapPanZoom.getScale();
                                }

                                el.mapPanZoom.zoom(zoomTo, { force: false });

                                el.mapCanZoom = false;
                                setTimeout(function () {
                                    el.mapCanZoom = true;
                                }, 200);
                            }
                        });
                    }
                } // endif: map-wrapper

            }); // endforeach

            // resize
            window.addEventListener('resize', function () {
                pZoomsH.updateAll();
            });

            // esc
            document.addEventListener('keydown', function (e) {
                if (e.keyCode == 27) {
                    //add your code here
                    pZoomsH.fullScreenCloseAll();
                }
            });




        }
    },
    update: function (el) {
        el.mapPanZoom.zoom(el.mapPanZoom.getScale(), { animate: false });
    },
    updateAll: function () {
        clearTimeout(pZoomsH.timer);
        pZoomsH.timer = setTimeout(function () {

            if (pZoomsH.els.length) {
                pZoomsH.els.forEach(el => {
                    pZoomsH.update(el);
                })
            }

        }, 60);
    }
}
export default pZoomsH;