<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        Penjelasan
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class="row align-items-center border p-2 rounded">
          <div class="col-12 col-md-3">
            <p>Semua perintah dalam <code>$(document).ready()</code> artinya akan dijalankan pertama kali ketika halaman
              di
              render </p>
            <ol class="list-group list-group-flush list-group-numbered">
              <li class="list-group-item">
                Panggil function <code>getState()</code>
              </li>
              <li class="list-group-item">
                lakukan modifikasi tulisan ON / OFF berdasarkan data yang didapatkan
              </li>
              <li class="list-group-item">
                Buat fungsi yang menjadi callback ketika terjadi perubahan dari switch, lalu jalankan function ledSwitch
                dengan
                parameter state yang berasal dari nilai switch
              </li>
            </ol>
          </div>
          <div class="col-12 col-md-9 bg-dark text-white rounded">
            <pre>
        <code>
    $(document).ready(function() {
      const ledState = getState()
      $("#ledState").html(ledState ? "ON" : "OFF");

      $("#switch").on("change", function() {
        var state = $(this).prop("checked");
        ledSwitch(state)
      });
    });
        </code>
    </pre>
          </div>
        </div>

        <div class="row align-items-center border p-2 rounded mt-1">
          <div class="col-12 col-md-3">
            <p>function <code>getState()</code> ini berfungsi untuk mendapatkan nilai terakhir dari database dan akan
              dijalankan pertamakali ketika halaman dirender</p>
          </div>
          <div class="col-12 col-md-9 bg-dark py-3 rounded">
            <div class="row">
              <div class="col-6">
                <h5 class="text-white">AJAX</h5>
                <pre class="text-white">
<code>
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
</code>
</pre>
              </div>
              <div class="col-6">
                <h5 class="text-white">LedController Method <code>getState()</code></h5>
                <pre class="text-white">
<code>
    public function getState()
    {
        $led = Led::first();
        return response()->json($led->ledState);
    }
                </code>
              </pre>
              </div>
            </div>
          </div>
        </div>

        {{-- penjelasan 2 --}}
        <div class="row align-items-center border p-2 rounded mt-1">
          <div class="col-12 col-md-3">
            <p>Switch sebagai trigger untuk menjalankan <code>ledSwitch()</code></p>
          </div>
          <div class="col-12 col-md-9 bg-dark py-3 text-white rounded d-flex">
            <div class="col-6">
              <h5>AJAX</h5>
              <pre>
        <code>
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
        </code>
    </pre>
            </div>
            <div class="col-6">
              <h5>LedController Method <code>switch()</code></h5>
              <pre>
        <code>
    public function switch(Request $request)
    {
        $state = $request->state;
        $led = Led::first();
        $led->ledState = $state;
        $led->save();
        return response()->json($led->ledState);
    }
        </code>
      </pre>
            </div>
          </div>
        </div>
        {{-- end penjelasan 2 --}}

      </div>
    </div>
  </div>
</div>
