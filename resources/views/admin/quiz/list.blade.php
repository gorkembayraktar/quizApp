<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            
            <a href="{{  route( 'quizzes.create' ) }}" class="btn btn-sm btn-primary">Quiz Oluştur <i class="bi bi-plus"></i></a>
            
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th>Toplam Soru</th>
                    <th scope="col">İşlemler</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($quizzes as $quiz)
                  <tr>
                    <th scope="row">{{ $quiz->title }}</th>
                    <td>
                    
                      @switch($quiz->status)
                        @case('publish')
                        <span class="badge badge-success text-dark">Aktif</span>
                        @break
                        @case('passive')
                        <span class="badge badge-success text-dark">Pasif</span>
                        @break
                        @case('draft')
                        <span class="badge badge-warning text-dark">Taslak</span>
                        @break
                      @endswitch

                    </td>
                    <td>@if($quiz->finished_at) <span title='{{$quiz->finished_at}}'>{{ $quiz->finished_at->diffForHumans() }} </span> @endif</td>
                    <td>{{ $quiz->questions_count }}</td>
                    <td>
                            <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-question"></i></a>
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                            <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              {{ $quizzes->links() }}
        </div>
    </div>
    
</x-app-layout>
