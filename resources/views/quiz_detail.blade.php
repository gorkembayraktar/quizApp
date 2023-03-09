<x-app-layout>
    <x-slot name="header">Anasayfa</x-slot>

    

    <div class="card">
      <div class="card-body">
            <div class="card-text">
                <div class="row">
                      <div class="col-md-4">
                        <ul class="list-group">
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Bitiş tarihi
                            <span class="badge bg-primary rounded-pill">{{ $quiz->finished_at->diffForHumans()}}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru sayısı
                            <span class="badge bg-primary rounded-pill">{{ $quiz->questions_count}}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            katılımcı sayısı
                            <span class="badge bg-primary rounded-pill">{{ 0 }}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            ortalama puan
                            <span class="badge bg-primary rounded-pill">1</span>
                          </li>
                        </ul>
                      </div>

                      <div class="col-md-8">
                          {{$quiz->description}}
                      </div>
                </div>
            </div>
            <a href="" class="btn btn-primary btn-block">Katıl</a>
      </div>
    </div>
    

</x-app-layout>
