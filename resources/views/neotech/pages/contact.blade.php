@extends(env('THEME') . '.layouts.basic')

@section('navigation')    
    @include(env("THEME") . '.includes.navigation')  
@endsection

@section('content')    

    <!-- Contact -->
      <section class="section-wrap pt-40 pb-40">
        <div class="container">

          <h1 class="page-title">Contact</h1>
            <img data-src="{{ asset(env('THEME')) }}/img/blog/contact_page_title.jpg" src="{{ asset(env('THEME')) }}/img/blog/contact_page_title.jpg" alt="" class="lazyload contact__img">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>                            
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach                            
                    </ul>
                </div>
            @endif 


            @if (session()->has("email_to_success"))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        <li>{!! session()->pull("email_to_success") !!}</li>
                    </ul>
                </div>
            @endif
          
          <div class="row justify-content-md-center">
            <div class="col-lg-8">

            <h3>Drop Us a Message</h3>
            <p>Не стесняйтесь связываться. Мы ответим вам как можно скорее.</p>

              <!-- Contact Form -->
              
              {!! Form::open(["url" => route('contact'), "method" => "POST", "id" => "contact-form", "class" => "contact-form mt-30 mb-30"]) !!}
              
                <div class="contact-name">
                    <label for="name">Name <abbr title="required" class="required">*</abbr></label>
                    
                    {!! Form::text("name", old("name"), ["id" => "name"]) !!}
                    
                </div>

                <div class="contact-email">
                  <label for="email">Email <abbr title="required" class="required">*</abbr></label>
                  
                  {!! Form::text("email", old("email"), ["id" => "email"]) !!}
                </div>

                <div class="contact-email">
                    <label for="email">Phone <abbr title="required" class="required">*</abbr></label>
                    
                    {!! Form::text("phone", old("phone"), ["id" => "phone"]) !!}
                </div>

                <div class="contact-subject">
                  <label for="subject">Subject</label>
                  
                  {!! Form::text("subject", old("subject"), ["id" => "subject"]) !!}
                </div>

                <div class="contact-message">
                  <label for="message">Message <abbr title="required" class="required">*</abbr></label>
                  
                  {!! Form::textarea("message", old("message"), ["id" => "message", "rows" => 7]) !!}
                  
                </div>

                {!! Form::submit("Send Message", ["class" => "btn btn-lg btn-color btn-button"]) !!}
                
                {{-- <div id="msg" class="message"></div> --}}
                
            {!! Form::close() !!}

            </div>
          </div>          

        </div>
      </section> 
      <!-- end contact -->

@endsection