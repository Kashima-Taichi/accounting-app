<p>年数を選択して下さい</p>
<select class="year" name="year" id="year">
    <option value="select">選択して下さい</option>
    @foreach ($yearSelectors as $yearSelector)
    <option value="{{ $yearSelector->year }}">{{ $yearSelector->year }}</option>
    @endforeach
</select>
<br>
<p>参照したい四半期を選択してください</p>
<select class="quarter" name="quarter" id="quarter">
    <option value="select">選択して下さい</option>
    <option value="4,6">第1四半期</option>
    <option value="7,9">第2四半期</option>
    <option value="10,12">第3四半期</option>
    <option value="1,3">第4四半期</option>
</select>