<p>年数を選択して下さい</p>
<select class="year" name="year" id="year">
    <option value="select">選択して下さい</option>
    @foreach ($yearSelectors as $yearSelector)
        <option value="{{ $yearSelector->year }}">{{ $yearSelector->year }}</option>
    @endforeach
</select>
<br>
<p>月数を選択して下さい</p>
<select class="month" name="month" id="month">
    <option value="select">選択して下さい</option>
    @foreach ($monthSelectors as $monthSelector)    
        <option value="{{ $monthSelector->month }}">{{ $monthSelector->month }}</option>
    @endforeach
</select>
