new Vue({
    el: '#submit',
    methods: {
        onclick: function (e) {
            // 入力されたデータを格納する配列を用意
            var costInput = new Array();
            costInput[0] = document.getElementById('year').value;
            costInput[1] = document.getElementById('month').value;
            costInput[2] = document.getElementById('day').value;
            costInput[3] = document.getElementById('price').value;
            costInput[4] = document.getElementById('journal').value;

            // 配列内に空文字があるかどうかの判定
            // JavaScript では null ないし空文字を条件式において false と判定する
            var result = costInput.some(item => item === null);
            if (result === null) {
                alert('記入されていない項目があります。');
                e.preventDefault();
            }

            // 勘定科目が「選択してください」ではないかを判定
            var accountVal = document.getElementById('account').value;
            if (accountVal === '選択してください') {
                alert('勘定科目を選択してください');
                e.preventDefault();
            }

            // 入力された金額が数値かをチェック
            var valCheck = costInput[3].match(/^-?[1-9][0-9]+$/);
            if (check === null) {
                alert('金額を0から始めると経費の計上は行えません');
                e.preventDefault();
            }
        }
    }
})