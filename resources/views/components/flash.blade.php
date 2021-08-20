@if(session()->has('success'))
  <div
    x-data="{show: true}"
    x-init="setTimeout(() => show = false, 5000)"
    x-show="show"
    class="fixed bottom-3 right-3 text-sm text-white bg-blue-500 py-2 px-4 rounded-xl">
    <p>{{ session('success') }}</p>
  </div>
@endif