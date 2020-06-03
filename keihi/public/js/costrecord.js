new Vue({
    el: '#submit',
    methods: {
        onclick: function (e) {
            // 記入漏れがあれば経費計上のキャンセル
            alert('a');
            e.preventDefault();
        }
    }
})