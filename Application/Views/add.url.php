<div class="bg-white shadow-sm border p-4 rounded">
	<form action="/add" method="POST" class="flex flex-col gap-2">
		<label for="link" class="text-lg font-semibold">URL</label>
		<input id="link" name="data" type="url" placeholder="https://example.com/somethings" class="border outline-0 rounded h-10 focus:border-sky-500 px-2" required>
		
		<div class="flex justify-center gap-2">
			<button type="submit" class="rounded bg-sky-600 h-10 text-white hover:bg-sky-700 w-48">
				Добавить
			</button>
			<a href="/" class="rounded bg-gray-100 h-10 text-black hover:bg-gray-200 w-48 flex justify-center items-center">
				Отменить
			</a>
		</div>
	</form>
</div>

<?php if (isset($result)) { ?>
<div class="bg-white shadow-sm border p-4 rounded mt-4">
	<p><?= $result ?></p>
</div>
<?php } ?>