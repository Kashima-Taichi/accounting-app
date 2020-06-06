new Vue({
    el: '#submit',
    methods: {
        onclick: function (e) {

            // イベントキャンセルフラグ
            var flg = true;

            // 入力されたデータを格納する配列を用意
            var incomeInput = new Array();
            incomeInput[0] = document.getElementById('year').value;
            incomeInput[1] = document.getElementById('month').value;
            incomeInput[2] = document.getElementById('totalSalary').value;
            incomeInput[3] = document.getElementById('basicSalary').value;
            incomeInput[4] = document.getElementById('overtimePay').value;
            incomeInput[5] = document.getElementById('healthInsurance').value;
            incomeInput[6] = document.getElementById('employeePension').value;
            incomeInput[7] = document.getElementById('employmentInsurance').value;
            incomeInput[8] = document.getElementById('incomeTax').value;
            incomeInput[9] = document.getElementById('otherDeduction').value;
            incomeInput[10] = document.getElementById('totalDeduction').value;
            incomeInput[11] = document.getElementById('netIncome').value;

            // // 配列内に空文字があるかどうかの判定
            // var result = incomeInput.some(item => item === null);
            // // 下の条件式について実際に使ってチェック
            // if (result === false) {
            //     alert('未記入の項目があります。');
            //     flg = false;
            // }

            // // 入力された金額が数値がどうかチェック
            // var regex = new RegExp(/^-?[1-9][0-9]+$/);
            // var numCheck = true;
            // incomeInput.forEach(function (item, index, array) {
            //     numCheck = regex.test(parseInt(incomeInput[index]));
            //     if (numCheck === false) {
            //         alert('0から始まらない数値でデータ入力を行ってください');
            //     }
            // })

            // 金額の整合性をチェック
            // 基本給と残業代、総支給金額との整合性をとる
            var calcTotalSalary = parseInt(incomeInput[3]) + parseInt(incomeInput[4]);
            if (calcTotalSalary !== parseInt(incomeInput[2])) {
                alert('基本給と残業代の合計と総支給額の整合性がとれていません');
                flg = false;
            }

            // 各種の控除額と控除額合計との整合性をとる
            var calcTotalDeduction = parseInt(incomeInput[5]) + parseInt(incomeInput[6]) + parseInt(incomeInput[7]) + parseInt(incomeInput[8]) + parseInt(incomeInput[9]);
            if (calcTotalDeduction != parseInt(incomeInput[10])) {
                alert('各種控除額の合計と控除額合計の整合性がとれていません');
                flg = false;
            }

            // 総支給金額と控除額合計、手取り金額の整合性をとる
            var calcNetIncome = parseInt(incomeInput[2]) - parseInt(incomeInput[10]);
            if (calcNetIncome != parseInt(incomeInput[11])) {
                alert('総支給金額と控除額合計、差引支給金額の整合性がとれていません');
                flg = false;
            }

            // 1つでも引っかかるとイベントをキャンセル
            if (flg === false) {
                e.preventDefault();
            }
        }
    }
})