<x-app-layout>
    <x-slot name="header">Anasayfa</x-slot>

    

    <div class="card">
      <div class="card-body">
            <div class="card-text">
                <div class="row">
                      <div class="col-md-4">
                        <ul class="list-group">
                          @if($quiz->my_result)
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Puan
                            <span class="badge bg-primary rounded-pill">{{ $quiz->my_result->point }}</span>
                          </li>
                       
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Doğru / Yanlış
                            <div class="float-right text-sm">

                              <span class="badge bg-success rounded-pill">{{ $quiz->my_result->correct }} Doğru</span>
                              <span class="badge bg-danger rounded-pill">{{ $quiz->my_result->wrong }} Yanlış</span>
                            </div>
                            </li>
                            @endif
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Bitiş tarihi
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->finished_at->diffForHumans()}}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru sayısı
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->questions_count}}</span>
                          </li>
                          @if($quiz->details)
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            katılımcı sayısı
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->details->join_count }}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            ortalama puan
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->details->average }}</span>
                          </li>
                          @endif
                        </ul>
                      </div>

                      <div class="col-md-8">
                          <p>
                            {{$quiz->description}}

                          </p>
                          <div class="d-grid gap-2 my-5">

                            @if($quiz->my_result)

                            <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-warning btn-block">Quiz i görüntüle</a>
                            @else
                            <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary btn-block">Katıl</a>
                            @endif

                          </div>
                      </div>

                </div>
            </div>
            
      </div>
    </div>
    

</x-app-layout>
