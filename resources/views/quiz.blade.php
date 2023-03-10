<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    

    <div class="card">
      <div class="card-body">
            <div class="card-text">
              <form method="POST" action="{{route('quiz.result', $quiz->slug)}}" >
              @csrf
              @foreach ($quiz->questions as $question)
              
              <p>
                <strong>#{{ $loop->iteration }}</strong>
                {{ $question->question}}
              </p>
              @if($question->image)
              <img src="{{asset($question->image)}}" alt="">
              @endif

              <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="question_{{$question->id}}" value="answer1" required>
                <label class="form-check-label" for="question_{{$question->id}}">
                  {{ $question->answer1 }}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="question2_{{$question->id}}" value="answer2" required>
                <label class="form-check-label" for="question2_{{$question->id}}">
                  {{ $question->answer2 }}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="question3_{{$question->id}}" value="answer3" required>
                <label class="form-check-label" for="question3_{{$question->id}}">
                  {{ $question->answer3 }}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="question4_{{$question->id}}" value="answer4" required>
                <label class="form-check-label" for="question4_{{$question->id}}">
                  {{ $question->answer4 }}
                </label>
              </div>
             
              @if(!$loop->last)
              <hr>
              @endif

              @endforeach

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-warning">Sınavı bitir</button>
              </div>

              </form>
            </div>
            
      </div>
    </div>
    

</x-app-layout>
