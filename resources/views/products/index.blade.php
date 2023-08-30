@extends('templates.master')
<style>
        body{
         background-color:  #f0f2f5;
        }
       .tela-01{
         background-color:#244c35 ;
         width: 1000%;  height:  14rem;
         margin-top: -9px;
       }
        
       img{
           width: 21px;
 
    margin-top: 0pc;
       }
       .tela-02{
         background-color:  #ffffff; margin-top: -71px; height: 131px;
       }
       .tela-03{
         display: flex;
       }
       p{
         font-size: 21px;
       }
       .valorPrincipal{
         color: #ffffff;
       }
     
       .tela-05{
         margin-top: 37px;
       }
    .lte-02{
     margin-top:  5rem;
 
    }
    .paiBotao{
     text-align: end; margin-top: 18rem;
     margin-right: 4rem;
    }
    /* button{
     border-radius: 25rem;
     height: 4rem;
     background-color: #244c35;
     border: 1px solid #244c35;
    }
   */
    .icone-02{
     color: #ffffff;
    }
    /*   */
    .modal-01{
     background-color: #f0f2f5;
    }
    .folte{
     border: 1px;
    }
    /* .div-central{
     background-color: #ffffff; margin-top: -11rem;
     height: 131px; margin-left: 3rem;
     margin-right: 3rem;
    } */
    .divTeceira{
     background-color: #e93d5b; margin-top: -71px;
     height: 131px;
    }
    @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
 
 
 body.dark {
   background: #adb5bd;
 }
 
 .checkbox {
   opacity: 0;
   position: absolute;
 }
 
 .label {
   background-color: #d9cdcd;
   border-radius: 50px;
   cursor: pointer;
   display: flex;
   justify-content: space-between;
   align-items: center;
 
   padding: 5px;
   position: relative;
      height: 53px;
   width: 50px;
   transform: scale(1.5);
 
 }
 
 
 .label .ball {
   background-color: #fff;
   border-radius: 50%;
   position: absolute;
   top: 2px;
   left: 2px;
   height: 22px;
   width: 22px;
   transform: translateX(0px);
   transition: transform 0.2s linear;
 }
 
 .checkbox:checked + .label .ball {
   transform: translateX(24px);
 }
 .navbar .container{
     display: block;
 }
 .fa-moon {
   color: #f1c40f;
 }
 
 .fa-sun {
   color: #f39c12;
 }
 .botaolog{
     justify-content: flex-end;
 }
     .for01 {
  border: 2px solid #ccc;
  display: inline-block;
  padding: 4px;
}

form > input {
  border: none;
      font-size: 21px;
}

form > button {
  background: royalblue;
  border: none;
  color: #fff;
  padding: 4px 10px
}
.pesquisa{
    font-size: 21px;
    background-color: #244c35;
}
th{
  font-size: 26px;
 }
    
    @media  (max-width: 540px) {
     .row{
         display: block;
     }
     .div-central{
         margin-left: 0px;
         margin-right: 0px;
         margin-top:  3px;
     }
     .divTeceira{
         margin-top: 3px;
     }
     svg{
       margin-top: 16px;
     }
     @media(max-width:700px) {
    .telaAm{
        max-width: 100%;
    overflow: scroll;
    }
    }
 }
 
   </style>
@section('content')
 
    <div class="container mt-5">
        

    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="    height: 7rem;">
                               
                    <a href="{{route('products.create')}}" style=" color:#fff;     background-color: #244c35;
                     border: 1px solid #244c35; font-size: 20px;     margin-top: 2rem;"  class="btn btn-info btn-icon-text mb-2 mb-md-0 mt4">
                <i data-feather="plus"></i> adicionar novo produto
            </a>



<form class="for01" method="GET"   style="float: right;     margin-top: 2rem;">
  <input type='text' name='name_completo' placeholder='O que você procura?'>
  <button type='submit' class="pesquisa">Pesquisar</button>
</form>
                   
                    </div>
                    <div class="card-body telaAm">
                    @if ($message = session('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

                         <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th style="font-size: 18px; text-align: center;">Nome Do Aluno </th>
                                    <th style="font-size: 18px; text-align: center;">Nome Do livro</th>
                                    <th style="font-size: 18px; text-align: center;"> Quantidade livros </th>
                                    <th style="font-size: 18px; text-align: center;"> Data</th>
                                    <th style="text-align: center; font-size: 18px;" > Tipos de Ação   </th>
                                </tr>
                            </thead>

                            
                            <tbody> 
                            @foreach($products as $index => $val)
                        <tr>
                            <!-- <td>{{++$index}}</td> -->
                            <td style="font-size: 18px; text-align: center;
">{{$val->detail}}</td>
                            
                            <td style="font-size: 18px; text-align: center;
">{{$val->name}}</td>
                            <td style="font-size: 18px; text-align: center;
">{{$val->image}}</td>
                           
                            <td style="font-size: 18px;">{{ $val->created_at }}</td>
                            <td>
                                <form style="margin-left: 1rem;" action="{{ route('products.destroy',$val->id) }}" method="POST">
                                    {{ csrf_field()  }}
                                    @method('DELETE')
                                    <a    class="btn btn-sm btn-success" href="{{route('products.show', $val->id)}}"><i data-feather="eye"></i> Show</a>
                                    <a   class="btn btn-sm btn-warning" href="{{route('products.edit', $val->id)}}"><i data-feather="link"></i> Edit</a>
                                    <button        class="btn btn-sm btn-danger" type="submit"><i data-feather="trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                            </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection
