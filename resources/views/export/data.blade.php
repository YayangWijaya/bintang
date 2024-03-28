<table>
    <thead>
        <tr>
            <th></th>
        </tr>
        <tr>
            <th></th>
        </tr>
	    <tr>
            <th></th>
            @foreach(max($data) as $key => $value)
            <th>{{ preg_replace('/^\~/mi', '', $key) }}</th>
            @endforeach
    	</tr>
    </thead>
    <tbody>
        @foreach($data as $index => $value)
        <tr>
            <td></td>
        @foreach (max($data) as $key => $p)
            <td>{{ array_key_exists($key, $value) ? $value[$key] : '' }}</td>
        @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
