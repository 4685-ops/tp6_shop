window.base = {
    g_restUrl: '',
    /**
     * @getData 任何请求数据都调用这个函数
     * @param params
     */
    getData: function (params) {
        if (!params.type) {
            params.type = 'get';
        }
        var that = this;

        $.ajax({
            type: params.type,
            url: this.g_restUrl + params.url,
            data: params.data,
            beforeSend: function (XMLHttpRequest) {
                if (params.tokenFlag) {
                    XMLHttpRequest.setRequestHeader('token', that.getLocalStorage('token'));
                }
            },
            success: function (res) {
                params.sCallback && params.sCallback(res);
            },
            error: function (res) {

                params.eCallback && params.eCallback(res);
            }
        });
    },
    /**
     * @function setLocalStorage 把数据写到h5缓存
     * @param key
     * @param val
     */
    setLocalStorage: function (key, val) {
        //缓存2小时
        var exp = new Date().getTime() + 2 * 24 * 60 * 60 * 100;  //令牌过期时间
        var obj = {
            val: val,
            exp: exp
        };
        localStorage.setItem(key, JSON.stringify(obj));
    },
    /**
     * @function getLocalStorage 获取缓存中的数据
     * @param key
     * @returns {string|*}
     */
    getLocalStorage: function (key) {
        var info = localStorage.getItem(key);
        if (info) {
            info = JSON.parse(info);
            if (info.exp > new Date().getTime()) {
                return info.val;
            } else {
                this.deleteLocalStorage('token');
            }
        }
        return '';
    },
    /**
     * @function  删除缓存数据
     * @param key
     */
    deleteLocalStorage: function (key) {
        return localStorage.removeItem(key);
    },
}
