<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2 class="font-weight-bold">Question</h2>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Question:</strong>
                {{ $question->title }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Option 1:</strong>
                {{ $question->option_1 }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option 2:</strong>
                {{ $question->option_2 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Option 3:</strong>
                {{ $question->option_3 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option 4:</strong>
                {{ $question->option_4 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Answer:</strong>
                {{ $question->answer }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Question image:</strong>
                <img src="questions/{{ $question->question_image }}" width="40px" alt="">

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option 1:</strong>
                <img src="questions/{{ $question->option_image_1 }}" width="40px" alt="">

            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option 2:</strong>
                <img src="questions/{{ $question->option_image_2 }}" width="40px" alt="">

            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option 3:</strong>
                <img src="questions/{{ $question->option_image_3 }}" width="40px" alt="">

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option 4:</strong>
                <img src="questions/{{ $question->option_image_4 }}" width="40px" alt="">

            </div>
        </div>






        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Answer Image:</strong>


                <?php 
if($question->answer_image=="1"){
?>

                <img src="{{ URL::asset('questions') }}/{{ $question->option_image_1 }}" width="40px">


                <?php
}elseif ($question->answer_image=="2") {?>
                <img src="{{ URL::asset('questions') }}/{{ $question->option_image_2 }}" width="40px">
                <?php
}elseif ($question->answer_image=="3") {?>
                <img src="{{ URL::asset('questions') }}/{{ $question->option_image_3 }}" width="40px">
                <?php
}elseif ($question->answer_image=="4") {?>
                <img src="{{ URL::asset('questions') }}/{{ $question->option_image_4 }}" width="40px">
                <?php
}else{?>
                <img src="" alt="Please select answer Image" width="40px">
                <?php
}
?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created:</strong>
                {{ date_format($question->created_at, 'jS M Y') }}
            </div>
        </div>
    </div>
    @endsection
