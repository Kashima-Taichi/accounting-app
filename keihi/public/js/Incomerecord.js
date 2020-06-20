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
            incomeInput[9] = document.getElementById('residentTax').value;
            incomeInput[10] = document.getElementById('otherDeduction').value;
            incomeInput[11] = document.getElementById('totalDeduction').value;
            incomeInput[12] = document.getElementById('netIncome').value;

            // 金額の整合性をチェック
            // 基本給と残業代、総支給金額との整合性をとる
            var calcTotalSalary = parseInt(incomeInput[3]) + parseInt(incomeInput[4]);
            if (calcTotalSalary !== parseInt(incomeInput[2])) {
                alert('基本給と残業代の合計と総支給額の整合性がとれていません');
                flg = false;
            }

            // 各種の控除額と控除額合計との整合性をとる
            var calcTotalDeduction = parseInt(incomeInput[5]) + parseInt(incomeInput[6]) + parseInt(incomeInput[7]) + parseInt(incomeInput[8]) + parseInt(incomeInput[9]) + parseInt(incomeInput[10]);
            if (calcTotalDeduction != parseInt(incomeInput[11])) {
                alert('各種控除額の合計と控除額合計の整合性がとれていません');
                flg = false;
            }

            // 総支給金額と控除額合計、手取り金額の整合性をとる
            var calcNetIncome = parseInt(incomeInput[2]) - parseInt(incomeInput[11]);
            if (calcNetIncome != parseInt(incomeInput[12])) {
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