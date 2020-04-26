<p>日付を選択して下さい</p>
<select class="day" name="day" id="day">
    <option value="select">選択して下さい</option>
    @foreach ($daySelectors as $daySelector)    
        <option value="{{ $daySelector->day }}">{{ $daySelector->day }}</option>
    @endforeach
</select>