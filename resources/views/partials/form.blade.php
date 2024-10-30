<!-- resources/views/partials/form.blade.php -->
<div class="mb-3">
    <form action="{{ route('groq.generate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="input_data">Masukkan Pertanyaan:</label>
            <textarea name="input_data" id="input_data" rows="4" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
