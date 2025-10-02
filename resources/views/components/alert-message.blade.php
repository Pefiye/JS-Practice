
<script defer>
    alert("{{ $message }}");
</script>

@php
    session()->remove('message');
@endphp