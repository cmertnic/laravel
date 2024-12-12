 @extends('layouts.main')
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Нарушений.нет</title>
  <link rel="stylesheet" href="/styles/home.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@section('content') 
<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Список заявлений') }}
  </h2>
</x-slot>

<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
      <div class="cards">
        <colgroup>
          <col span="2" style="background:Khaki">
        </colgroup>
        <table>
          <tr style="background-color: rgb(54, 6, 228);color: rgb(255, 255, 255);"> 
            <th>Дата создания</th>
            <th>№ авто</th>
            <th>Описание</th>
            <th>ФИО автора</th>
            <th>Статус</th>
          </tr>
          @foreach($reports as $item)      
            <tr id="applicationContainer-{{ $item->id }}" style="{{ $item['status_id'] == 2 ? 'background-color: rgb(250, 0, 0);' : ($item['status_id'] == 3 ? 'background-color: ;' : ''); }}"> 
              <td>{{ $item['created_at'] }}</td>
              <td>{{ $item->number }}</td>
              <td>{{ $item['description'] }}</td>   
              <td>{{ Auth::user()->fullname() }}</td> 
              <td>
                <form method="POST" action="{{ route('reports.update', $item->id) }}" class="status-form" id="form-{{ $item->id }}">
                  @csrf
                  @method('PUT')
                  <div style="padding: 10px;">
                      <div>
                          <select id="statusSelect-{{ $item->id }}" name="status_id" style="background-color: white; color: black;" onchange="updateStatus(this, '{{ $item->id }}');" 
                              @if($item['status_id'] == 2 || $item['status_id'] == 3) disabled @endif>
                              <option style="color: white;" value="1" {{ $item['status_id'] == 1 ? 'selected' : '' }}>Новое</option>
                              <option style="color: rgb(250, 0, 0);" value="2" {{ $item['status_id'] == 2 ? 'selected' : '' }}>Отклонено</option>
                              <option style="color: rgb(15, 18, 221);" value="3" {{ $item['status_id'] == 3 ? 'selected' : '' }}>Подтверждено</option>
                          </select>
                      </div>
                  </div>
              </form>
              
              <script>
              function updateStatus(selectElement, applicationId) {
                  const selectedValue = selectElement.value;
                  const applicationContainer = document.getElementById('applicationContainer-' + applicationId);
              
                  let textColor;
                  let backgroundColor;
                  switch (selectedValue) {
                      case '1':
                          textColor = 'black'; 
                          backgroundColor = ''; 
                          break;
                      case '2':
                          textColor = 'red'; 
                          backgroundColor = 'rgb(250, 0, 0)'; 
                          break;
                      case '3':
                          textColor = 'blue'; 
                          backgroundColor = ''; 
                          break;
                      default:
                          textColor = 'black';
                  }
              
                  selectElement.style.color = textColor;
                  applicationContainer.style.backgroundColor = backgroundColor;

if (selectedValue != '2' || selectElement.selectedIndex !== 2&&selectedValue != '3' || selectElement.selectedIndex !== 3) 
{ const form = document.getElementById('form-' + applicationId); form.submit(); }
              }
              
              window.onload = function() {
                  const selectElement = document.getElementById('statusSelect-{{ $item->id }}');
                  const initialStatus = selectElement.value;
                  updateInitialStatus(selectElement, initialStatus, '{{ $item->id }}');
              }

              function updateInitialStatus(selectElement, initialStatus, applicationId) {
                  const applicationContainer = document.getElementById('applicationContainer-' + applicationId);
                  let textColor;
                  let backgroundColor;

                  switch (initialStatus) {
                      case '1':
                          textColor = 'black'; 
                          backgroundColor = ''; 
                          break;
                      case '2':
                          textColor = 'red'; 
                          backgroundColor = 'rgb(250, 0, 0)'; 
                          break;
                      case '3':
                          textColor = 'blue'; 
                          backgroundColor = ''; 
                          break;
                      default:
                          textColor = 'black';
                  }

                  selectElement.style.color = textColor;
                  applicationContainer.style.backgroundColor = backgroundColor;
              }
              </script>
                                   
              </td>
            </tr>       
          @endforeach 
        </table>
        {{ $reports->links() }}
      </div>  
    </div>
  </div>
</div>

@endsection
