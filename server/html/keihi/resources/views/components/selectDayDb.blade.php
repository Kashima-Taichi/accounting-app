<p>日付を選択して下さい</p>
<select class="day" name="day" id="day">
    <option value="select">選択して下さい</option>
    @for ($i = 1; $i <= 31; $i++)    
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>