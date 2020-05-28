<br>
<p>経費計上科目を選択して下さい</p>
<select class="account" name="account" id="account">
    <option value="select">選択して下さい</option>
    @foreach ($accounts as $account)
        <option value="{{ $account->accountName }}">{{ $account->accountName }}</option>
    @endforeach
</select>
<br>
