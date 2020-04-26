$(function () {

    // #jsは演算を行うときに、parseInt()をしないと足し算が行われない
    // functionのカッコ内にeを入れておかないとイベントのキャンセルがされない
    $('#submit').on('click', function (e) {

        // id属性に設定されている値を取得
        var totalSalary = $('#totalSalary').val();
        var basicSalary = $('#basicSalary').val();
        var overtimePay = $('#overtimePay').val();
        var healthInsurance = $('#healthInsurance').val();
        var employeePension = $('#employeePension').val();
        var employmentInsurance = $('#employmentInsurance').val();
        var incomeTax = $('#incomeTax').val();
        var otherDeduction = $('#otherDeduction').val();
        var totalDeduction = $('#totalDeduction').val();
        var netIncome = $('#netIncome').val();

        // 基本給と残業代、総支給金額との整合性をとる
        var calcTotalSalary = parseInt(basicSalary) + parseInt(overtimePay);
        if (calcTotalSalary != totalSalary) {
            alert('基本給と残業代の合計と総支給額の整合性がとれていません');
            e.preventDefault();
            $('#totalSalary, #basicSalary, #overtimePay').css('border', '2px #BDB76B solid');
        }

        // 各種の控除額と控除額合計との整合性をとる
        var calcTotalDeduction = parseInt(healthInsurance) + parseInt(employeePension) + parseInt(employmentInsurance) + parseInt(incomeTax) + parseInt(otherDeduction);
        if (calcTotalDeduction != totalDeduction) {
            alert('各種控除額の合計と控除額合計の整合性がとれていません');
            $('#healthInsurance, #employeePension, #employmentInsurance, #otherDeduction, #totalDeduction, #incomeTax').css('border', '2px #FF8C00 solid');
            e.preventDefault();
        }

        // 総支給金額と控除額合計、手取り金額の整合性をとる
        var calcNetIncome = parseInt(totalSalary) - parseInt(totalDeduction);
        if (calcNetIncome != netIncome) {
            alert('総支給金額と控除額合計、差引支給金額の整合性がとれていません');
            $('#netIncome').css('border', '2px #FF1493 solid');
            e.preventDefault();
        }

    });

});