<div class="bg-white shadow-sm border p-4 rounded">
	<?php if ($session->hasFlash()) { ?>
	<div class="bg-red-100 rounded px-4 py-2">
		<?= $session->getFlash() ?>
	</div>
	<?php } ?>
	<form action="/signup" method="POST" class="flex flex-col gap-2">
		<label for="username" class="text-lg font-semibold">Имя пользователя</label>
		<input id="username" name="username" type="text" placeholder="Имя пользователя..." class="border outline-0 rounded h-10 focus:border-sky-500 px-2" autofocus required>

		<label for="password" class="text-lg font-semibold">Пароль</label>
		<input id="password" name="password" type="password" placeholder="Пароль..." class="border outline-0 rounded h-10 focus:border-sky-500 px-2" required>

		<label for="password-conf" class="text-lg font-semibold">Подтверждение пароля</label>
		<input id="password-conf" name="password-conf" type="password" placeholder="Подтверждение пароля..." class="border outline-0 rounded h-10 focus:border-sky-500 px-2" required>
		
		<div class="flex justify-center">
			<button type="submit" class="rounded bg-sky-600 h-10 text-white hover:bg-sky-700 w-48">
				Создать
			</button>
		</div>
		<a href="/" class="text-sky-600">У меня уже есть аккаунт</a>
	</form>
</div>