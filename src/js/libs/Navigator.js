import './popstate-direction.js';

export default class Navigator {

    constructor({
        targetID,
        afterLoad,
        beforLoad,
        afterFirst
    }) {

        this.$body = document.body;

        this.loading = false;
        this.currentLocation = '';
        this.first_load = false;

        this.afterLoad = afterLoad || false;
        this.beforLoad = beforLoad || false;
        this.afterFirst = afterFirst || false;

        this.targetID = targetID || 'cs-nav';

        this.bind();
    }

    bind() {
        this.currentLocation = location.href;
        window.addEventListener('forward', event => {
            if (!this.loading && location.href && !this.HasAnchor(location.href))
                this.LoadContent(location.href, true)
        });

        window.addEventListener('back', event => {
            if (!this.loading && location.href && !this.HasAnchor(location.href)) {
                this.LoadContent(location.href, false)
            }
        });
        //window.addEventListener('popstate', (event) => {});
        const elementSelector = 'a';
        // this.$body.on('click', '[data-go]', (event) => {
        this.$body.addEventListener('click', (e) => {
            for (var target = e.target; target && target != this.$body; target = target.parentNode) {
                if (target.matches(elementSelector)) {
                    this.Navigate(target, e);
                    break;
                }
            }
        }, false);


    }


    Navigate(target, event = false) {
        if (target.target == '_blank' ||
            target.target == '_self' ||
            !target.href ||
            this.HasAnchor(target.href) ||
            this.HasJs(target.href) ||
            this.isExternal(target.href) ||
            this.hasExtension(target.href)
            // target.download != ''
        ) {
            return true
        }
        else {
            let page = target.href;

            if (event)
                event.preventDefault();

            if (!this.loading && page) {
                this.LoadContent(page, true); //.then(() => {})
            }

            return false;
        }
    }
    hasExtension(href) {
        return (!!this.get_url_extension(href));
    }
    parseUrl(link) {
        const a = document.createElement('a');
        a.href = link;
        return a;
    }

    HasJs(href) {
        return (href.indexOf("javascript:") > -1);
    }

    HasAnchor(href) {
        return (href.indexOf("#") > -1);
    }

    isExternal(link) {
        const currentPage = window.location || window.document.location;
        return (this.parseUrl(link).hostname !== currentPage.hostname);
    }

    UpdateTitle(data) {
        let page_title = data.match(/<title>(.*?)<\/title>/);
        document.getElementsByTagName('title')[0].innerHTML = page_title[1];
    }

    ReplaceContent(target, content) {
        return new Promise((resolve, reject) => {
            let doc = new DOMParser().parseFromString(content, "text/html");
            doc.body.classList.add('ready');
            document.body.classList = doc.body.classList;

            document.getElementById(target).innerHTML = doc.getElementById(target).innerHTML

            // if (document.getElementById('cookie') && doc.getElementById('cookie')) {
            //     document.querySelector('#cookie .cookie__container p').innerHTML = doc.querySelector("#cookie .cookie__container p").innerHTML;
            //     document.querySelector('#cookie .cookie__ok').innerHTML = doc.querySelector("#cookie .cookie__ok").innerHTML;
            // }
            return resolve();
        })
    }
    get_url_extension(url) {
        url = url.substr(1 + url.lastIndexOf("/"));
        // // Break URL at ? and take first part (file name, extension)
        url = url.split('?')[0];
        // // Sometimes URL doesn't have ? but #, so we should aslo do the same for #
        url = url.split('#')[0];
        let ext = false;
        if(url){
            ext = url.split('.')[1] || false;
        }
        // // Now we have only extension
        return ext;
    }
    PageRequest(filePath) {

        return new Promise((resolve, reject) => {
            const init = {
                method: "GET",
                headers: {
                    "Content-Type": "text/html"
                },
                mode: "cors",
                cache: "default"
            };
            const req = new Request(filePath, init);
            fetch(req)
                .then((response) => {
                    return response.text();
                })
                .then((body) => {

                    return resolve(body)
                }).catch(err => {
                    console.log('err', err);
                    return reject(err);
                });
        })
    }

    TriggerFirstCb() {
        if (!this.first_load && this.afterFirst) {
            this.afterFirst();
            this.first_load = true;
        }
    }

    UpdateHistory(page, bool = true) {
        if (page != window.location && bool) {
            window.history.pushState({
                path: page + window.location.hash
            }, '', page);
        }
    }




    LoadContent(page, scrollTop = false, overideTarget = null) {

        if (this.beforLoad) {
            this.beforLoad()
        }

        return new Promise((resolve, reject) => {
            this.loading = true;

            // asign new location
            this.currentLocation = page;

            this.$body.classList.add('load');
            document.documentElement.classList.add('no-smooth');

            this.PageRequest(page).then(data => {
                if (data) {
                    this.ReplaceContent(overideTarget || this.targetID, data).then(() => {
                        if (this.afterLoad) {
                            setTimeout(() => {
                                this.afterLoad()
                            }, 1)
                        }
                        this.UpdateTitle(data);
                        this.UpdateHistory(page);
                        this.TriggerFirstCb();
                    }).catch(err => {
                        return reject(err);
                    });
                }
            }).catch(err => {
                // console.log(err);
            }).finally(() => {
                if (scrollTop) {
                    // document.documentElement.scrollTop = 0;
                    window.scrollTo(0, 0);
                }
                this.$body.classList.remove('load');
                document.documentElement.classList.remove('no-smooth');
                this.loading = false;

                setTimeout(() => {
                    document.body.classList.add('ready');
                    return resolve();
                }, 50)
            });
        })

    }

}