@extends('layouts.app')
@section('content')
  <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center">
    <div class="container">
      <div class="d-flex align-items-center gap-5">
        <h1 class="text-uppercase fw-bold display-1">webiot</h1>
        <div class="form-check form-switch d-flex flex align-items-center gap-3">
          <input class="form-check-input" type="checkbox" role="switch" id="switch" style="width: 100px; height: 40px;">
          <h1 id="ledState" class="mt-3"></h1>
        </div>
      </div>
      <p class="fs-1">Latihan koneksi antara <code>NodeMCU ESP8266</code> dengan RESTFull Api Laravel sebagai server
      </p>
      <span class="m-0 p-0">Halaman ini diakses dari <code>route.php</code></span>
      </p>
      <x-penjelasan></x-penjelasan>
    </div>
  </div>
@endsection
@push('js')
  <script>
    function getState() {
      $.ajax({
        type: "GET",
        url: "{{ route('led.state') }}",
        success: function(response) {
          let ledState = response
          return ledState
        }
      });
    }

    function ledSwitch(state) {
      $.ajax({
        type: "POST",
        url: "{{ route('led.switch') }}",
        data: {
          _token: "{{ csrf_token() }}",
          state: state ? 1 : 0,
        },
        success: function(response) {
          $("#ledState").html(response == 1 ? "ON" : "OFF");
        }
      });
    }

    $(document).ready(function() {
      const ledState = getState()
      $("#ledState").html(ledState ? "ON" : "OFF");

      $("#switch").on("change", function() {
        var state = $(this).prop("checked");
        ledSwitch(state)
      });
    });
  </script>
@endpush
