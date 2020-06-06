new Vue({
    el: '#submit',
    methods: {
        onclick: function (e) {
            var yearInput = document.getElementById('year').value;
            var monthInput = document.getElementById('month').value;

            if (yearInput === 'select') {
                alert('年を選択して下さい');
                e.preventDefault();
            }

            if (monthInput === 'select') {
                alert('月を選択して下さい');
                e.preventDefault();
            }
        }
    }
})