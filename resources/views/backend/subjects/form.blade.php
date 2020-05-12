<div class="box-body">
    <div class="form-group">
    
         {{ Form::label('name', trans('labels.backend.subjects.sname'), ['class' => 'col-lg-2 control-label required']) }} 

        <div class="col-lg-10">
        
          {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.subjects.sname'), 'required' => 'required']) }}
        </div>
    </div>
    <div class="form-group">
    
    {{ Form::label('subject_code', trans('labels.backend.subjects.scode'), ['class' => 'col-lg-2 control-label required']) }} 

   <div class="col-lg-10">
   
     {{ Form::text('subject_code', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.subjects.scode'), 'required' => 'required']) }}
   </div>
</div>
<div class="form-group">
    
    {{ Form::label('credit_hours', trans('labels.backend.subjects.chours'), ['class' => 'col-lg-2 control-label required']) }} 

   <div class="col-lg-10">
   
     {{ Form::text('credit_hours', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.subjects.chours'), 'required' => 'required']) }}
   </div>
</div>
<div class="form-group">
    
    {{ Form::label('semester_id', trans('labels.backend.subjects.sid'), ['class' => 'col-lg-2 control-label required']) }} 
   <div class="col-lg-10">
     {!! Form::select('semester_id',$semester,null, ['class' => 'form-control box-size'])  !!}
   </div>
</div>
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
