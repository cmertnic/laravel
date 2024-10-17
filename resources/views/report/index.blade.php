   @extends('layout.main')

    @section('content') 
    <div class="cards">
        @foreach($reports as $item)
        <colgroup>
            <col span="2" style="background:Khaki">
          </colgroup>
        <table >
            <tr class="text-red">
            <th>№ жалобы</th>
            <th>Описание</th>
            <th>Дата создания</th>
            <th>Дата обновления</th>
          </tr>
          <tr >
            <th>{{ $item['number'] }}</th>
            <th>{{ $item['description'] }}</th>
            <th>{{ $item['created_at'] }}</th>
            <th>{{ $item['updated_at'] }}</th>
          </tr>
        </table>
        @endforeach
    </div>   
    @endsection