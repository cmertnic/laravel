   @extends('layout.main')

    @section('content') 
    <div class="cards">  <colgroup>
            <col span="2" style="background:Khaki">
          </colgroup>
          <table >
            <tr class="text-red">
            <th>№ жалобы</th>
            <th>Описание</th>
            <th>Дата создания</th>
            <th>Дата обновления</th>
          </tr>
        @foreach($reports as $item)      
          <tr >
            <th>{{ $item['number'] }}</th>
            <th>{{ $item['description'] }}</th>
            <th>{{ $item['created_at'] }}</th>
            <th>{{ $item['updated_at'] }}</th>
            <th>
              <form method="POST" action="{{route('reports.destroy',$item->id)}}">
              @method('delete')
              @csrf
              <input type="submit" value="Удалить">
              </form>
            </th>
          </tr>       
        @endforeach 
      </table>
    </div>   
    @endsection