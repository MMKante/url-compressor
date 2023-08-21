<div>
	<a href="/add" class="bg-green-500 text-white px-4 py-2 rounded shadow">
		Добавить
	</a>
</div>
<br>

<div class="flex flex-col">
	<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
		<div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
			<div class="overflow-hidden">
				<table class="min-w-full text-left text-sm font-light">
					<thead
					class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
					<tr>
						<th scope="col" class="px-6 py-4">#</th>
						<th scope="col" class="px-6 py-4">URL</th>
						<th scope="col" class="px-6 py-4">Сжатый URL</th>
						<th scope="col" class="px-6 py-4">Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($urls as $key => $url) { ?>
					<tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
						<td class="whitespace-nowrap px-6 py-4 font-medium"><?= ($key+1) ?></td>
						<td class="whitespace-nowrap px-6 py-4">
							<a href="<?= $url->url() ?>" target="_blank">
								<?= (strlen($url->url()) < 20) ? $url->url() : substr($url->url(), 17).'...' ?>
							</a>
						</td>
						<td class="whitespace-nowrap px-6 py-4">
							<a href="http://<?= $url->compressed_url() ?>" target="_blank">
								<?= $url->compressed_url() ?>
							</a>
						</td>
						<td class="whitespace-nowrap px-6 py-4">
							<a href="/delete/<?= $url->id() ?>" class="bg-red-500 text-white px-2 py-1 rounded shadow" onclick="return confirm('Вы уверены?')">
								Удалить
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>