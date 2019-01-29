
@extends('layouts.app')

@section('content')

<section class="row justify-content-center">
	<form method="POST" action="/save_expense_report" enctype="multipart/form-data" class="row col-md-5">

		<h1 class="col-sm-12"> 
			@if (isset($expenseReport))
                {!! Form::model($expenseReport, ['url'=>'save_expense_report', 'files' => true]) !!}
                {!! Form::hidden('expense_report_id', $expenseReport->id) !!}
				Edition de la note de frais              
            @else
                {!! Form::open(['url'=>'save_expense_report', 'files' => true]) !!}
                Déclaration d'une nouvelle note de frais
            @endif
        </h1>

		<div class="card-body row">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

			<div class="form-group col-sm-6">
				{{ Form::numberInput('amount', null, ['step' => '0.01', 'placeholder' => 'Montant en euro'])}}
			</div>

			<div class="form-group col-sm-6">
				{{ Form::dateInput('date_expense')}}
			</div>

			<div class="form-group col-sm-12">
				{{ Form::simpleInput('provider', null, ['placeholder' => 'Etablissement'])}}
			</div>

			<div class="form-group col-sm-12">
				{{ Form::textAreaInput('details', null, ['rows' => 6, 'placeholder' => 'Indiquez la nature de la dépense, les personne concernées, ou tout détail concernant la note de frais'])}}
			</div>

			<label id="Justificatif_label" class="form-group col-sm-12"> Justificatif </label>
			<ul class="form-group col-sm-12" id="liste">
				@if(isset($expenseReport->id) && sizeof($documents) !== 0)
					@foreach($documents as $key => $document)
			            <li class="form-group col-sm-12" style='padding: 0px'>
				            <a target="_blank" href='{{ route('open_supporting_documents',['document' => $document -> document]) }}' > {{ $document -> document_name}} </a>
				            <button type="button" id="button_{{$key}}" value="{{ $document -> id}}" onclick="deleteDocument(event)" class="btn btn-danger btn-sm" style="float:right"> Delete </button>
				            <br>
				            <img style="width:15%" class="img" src="{{ '/storage/'.$document->document }}">
				        </li>	
					@endforeach	
				@endif
			</ul>
				<div class="form-group col-sm-12" id="input-document">
					<input type="file" id="file_0" name="file_0" accept="image/*">
				</div>
			<div class="form-group col-sm-12 justify-content-end">
				<button type="submit" id="form-submit" class="btn btn-success btn-lg" style="float:right"> Valider </button>
			</div>
		</div>
	</form>
</section>

@endsection

<script type="text/javascript">

window.onload = function()
{
	// initialisation
	var compteur = 1;
	var inputElement = document.getElementById("file_0");
	inputElement.addEventListener("change", handleFiles, false);

	function handleFiles(e)	
	{
		var temp = document.getElementsByTagName("template")[0];
		var clone = temp.content.cloneNode(true);
		clone.querySelector('p').innerHTML = e.target.files[0].name;

        var reader  = new FileReader();
        reader.onload = function(e) 
        {
			clone.querySelector('img').src = e.target.result;
            inputElement.className = "hidden";
            clone.querySelector('li').appendChild(inputElement);

        	clone.querySelector('button').addEventListener('click', function (event) {
				event.target.parentElement.remove();
			});

            document.getElementById("liste").appendChild(clone);

            // ajoute un nouvel input
			var temp2 = document.getElementsByTagName("template")[1];
			var clone2 = temp2.content.cloneNode(true);
			inputElement = clone2.querySelector('input');
			inputElement.name+= compteur;
			compteur++;

	        document.getElementById("input-document").appendChild(inputElement);
	        inputElement.addEventListener("change", handleFiles, false);
        }
	    reader.readAsDataURL(e.target.files[0]);
	}
}
// Bouton delete à finir
function deleteDocument(event)
{
	if (confirm("Etes-vous sûr de vouloir effacer le justificatif ?"))
	{
		var xhr = new XMLHttpRequest();
		xhr.open("GET", '/document/' + event.target.value, true);
		xhr.onreadystatechange = function()
		{
		    if (xhr.readyState === 4 && xhr.status === 200){
				event.target.parentElement.remove();
		    }
		}
		xhr.send();
	}
}

</script>

<template>
	<li>
		<p style="display: inline;"></p>
		<button class="btn btn-danger btn-sm" style="float: right;">Delete</button>
		<br>
		<img src="" style="width: 15%">
	</li>
</template>
<template>
	<input type="file" name="file_" accept="image/*">
</template>
