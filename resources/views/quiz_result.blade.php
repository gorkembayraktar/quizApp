<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Sonuçları</x-slot>

    

    <div class="card">
      <div class="card-body">
            <div class="card-text">

              <h3>PUAN : {{$quiz->my_result->point}}</h3>
             
              @foreach ($quiz->questions as $question)
              
              
              <p>
                @if($question->correct_answer == $question->my_answer->answer)
                  <i class="bi bi-check-circle-fill text-success"></i>
                @else
                  <i class="bi bi-x-circle-fill text-danger"></i>
                @endif
                <strong>#{{ $loop->iteration }}</strong>
                {{ $question->question}}
              </p>
              @if($question->image)
              <img src="{{asset($question->image)}}" alt="">
              @endif

              <div class="form-check">
                @if($question->correct_answer == 'answer1')
                  <i class="bi bi-check-circle-fill"></i>
                @elseif($question->my_answer->answer == 'answer1')
                  <i class="bi bi-arrow-bar-right"></i>
                @endif
                <label class="form-check-label" for="question_{{$question->id}}">
                  {{ $question->answer1 }}
                </label>
              </div>
              <div class="form-check">
                @if($question->correct_answer == 'answer2')
                <i class="bi bi-check-circle-fill"></i>
                @elseif($question->my_answer->answer == 'answer2')
                <i class="bi bi-arrow-bar-right"></i>
              @endif
                <label class="form-check-label" for="question2_{{$question->id}}">
                  {{ $question->answer2 }}
                </label>
              </div>
              <div class="form-check">
                @if($question->correct_answer == 'answer3')
                <i class="bi bi-check-circle-fill"></i>
                @elseif($question->my_answer->answer == 'answer3')
                <i class="bi bi-arrow-bar-right"></i>
              @endif
                <label class="form-check-label" for="question3_{{$question->id}}">
                  {{ $question->answer3 }}
                </label>
              </div>
              <div class="form-check">
                @if($question->correct_answer == 'answer4')
                <i class="bi bi-check-circle-fill"></i>
                @elseif($question->my_answer->answer == 'answer4')
                <i class="bi bi-arrow-bar-right"></i>
              @endif
                <label class="form-check-label" for="question4_{{$question->id}}">
                  {{ $question->answer4 }}
                </label>
              </div>

              <div class="alert alert-info text-sm">
                Bu soruya <strong>%{{$question->true_percent}}</strong> oranında doğru cevap verildi.
              </div>
             
              @if(!$loop->last)
              <hr>
              @endif

              @endforeach

            </div>
            
      </div>
    </div>
    

</x-app-layout>
