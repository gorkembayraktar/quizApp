<x-app-layout>
    <x-slot name="header">{{ $quiz->tite }} için Soru Oluştur </x-slot>


    @if($errors->any())
      @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach

    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('questions.store', $quiz->id)}}" enctype="multipart/form-data">
              @csrf

              <div class="form-group">
                <label for="">Soru</label>
                <textarea name="question" class="form-control">{{ old('question')}} </textarea>
              </div>
              <div class="form-group">
                <label for="">Fotoğraf</label>
                <input type="file" name="image" class="form-control" >
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Cevap 1</label>
                        <textarea name="answer1" class="form-control">{{ old('answer1')}} </textarea>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Cevap 2</label>
                      <textarea name="answer2" class="form-control">{{ old('answer2')}} </textarea>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Cevap 3</label>
                      <textarea name="answer3" class="form-control">{{ old('answer3')}} </textarea>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Cevap 4</label>
                    <textarea name="answer4" class="form-control">{{ old('answer4')}} </textarea>
                  </div>
              </div>
            </div>
          
            <div class="form-group">
              <label for="">Doğru Cevap</label>
              <select class="form-control" name="correct_answer">
                  <option value="answer1" @selected(old('correct_answer') == 'answer1')>1.cevap</option>
                  <option value="answer2" @selected(old('correct_answer') == 'answer2')>2.cevap</option>
                  <option value="answer3" @selected(old('correct_answer') == 'answer3')>3.cevap</option>
                  <option value="answer4" @selected(old('correct_answer') == 'answer4')>4.cevap</option>
              </select>  
            </div>
              <div class="form-group">
                <button class="btn btn-sm  btn-block btn-success">Quiz Oluştur</button>
              </div>

            </form>
           
        </div>
    </div>

    
</x-app-layout>
