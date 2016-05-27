@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="panel panel-info">
    <div class="panel-heading">
      See What's Happening...
    </div>

    <div class="panel-body">
    
      <!-- Display flashed session data on successful action -->
      @if (session('status'))
        <div class="alert alert-success alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      @endif

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer justo velit, lacinia eget feugiat vel, facilisis in sapien. In quis porttitor diam, id dictum libero. Morbi imperdiet nec felis vitae porttitor. Donec bibendum dui vitae neque lobortis, ut maximus ante ornare. Suspendisse pretium dui id nibh iaculis vehicula. Cras sapien elit, condimentum et finibus a, mattis at enim. Vivamus non eros vestibulum, eleifend nunc eget, malesuada enim. Donec arcu lectus, blandit non sagittis id, facilisis nec purus. Vestibulum finibus lobortis elit nec accumsan. Ut ac ullamcorper orci, et malesuada urna. Nullam turpis arcu, gravida id dui ut, aliquet viverra elit. Sed blandit, urna quis fringilla auctor, elit lectus tristique mauris, laoreet faucibus arcu ipsum fermentum tortor. Nulla bibendum, enim ac lacinia viverra, arcu nunc eleifend nisi, eu mattis diam felis et leo. Vestibulum cursus, urna et imperdiet mattis, nisi massa placerat sapien, malesuada tincidunt ex felis gravida nunc. Donec sollicitudin suscipit odio, quis aliquam neque imperdiet vel.</p>

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer justo velit, lacinia eget feugiat vel, facilisis in sapien. In quis porttitor diam, id dictum libero. Morbi imperdiet nec felis vitae porttitor. Donec bibendum dui vitae neque lobortis, ut maximus ante ornare. Suspendisse pretium dui id nibh iaculis vehicula. Cras sapien elit, condimentum et finibus a, mattis at enim. Vivamus non eros vestibulum, eleifend nunc eget, malesuada enim. Donec arcu lectus, blandit non sagittis id, facilisis nec purus. Vestibulum finibus lobortis elit nec accumsan. Ut ac ullamcorper orci, et malesuada urna. Nullam turpis arcu, gravida id dui ut, aliquet viverra elit. Sed blandit, urna quis fringilla auctor, elit lectus tristique mauris, laoreet faucibus arcu ipsum fermentum tortor. Nulla bibendum, enim ac lacinia viverra, arcu nunc eleifend nisi, eu mattis diam felis et leo. Vestibulum cursus, urna et imperdiet mattis, nisi massa placerat sapien, malesuada tincidunt ex felis gravida nunc. Donec sollicitudin suscipit odio, quis aliquam neque imperdiet vel.</p>
    </div>
  </div>
@endsection