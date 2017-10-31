@extends('layout')

@section('content')
<h4>{{ $questionnaire->content }}</h4>
<table class="bordered striped">
  <thead>
    <tr>
        <th data-field="id">Question</th>
        <th data-field="name">Answers</th>
    </tr>
  </thead>

  <tbody>
    @forelse ($questionnaire->questions as $item)
    <tr>
      <td>{{ $item->content }}</td>
      @foreach ($item->answers as $answer)
        <td>{{ $answer->answer }} <br/>
        
      @endforeach
    </tr>
    @empty
      <tr>
        <td>
          No answers provided by you for this Survey
        </td>
        <td></td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection
