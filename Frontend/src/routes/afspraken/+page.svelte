<script>
	import { onMount } from "svelte";
	let afspraken = [];

	onMount(async () => {
		try {
			const res = await fetch("http://localhost:8000/api/afspraken");
			if(!res.ok) throw new Error("Network response not OK");

			afspraken = await res.json();
		} catch(e) {
			console.error("Kon afspraken niet ophalen:", e);
		}
	});
</script>

<h1 class="text-2xl font-bold mb-4">Mijn Afspraken</h1>

<ul class="space-y-2">
	{#each afspraken as a}
		<li class="p-2 border rounded shadow">
			<p><strong>{a.naam}</strong> - {a.datum} {a.tijd}</p>
			<p>Dienst: {a.dienst}</p>
			<p>{a.opmerking}</p>
			<a href={`/afspraak/${a.id}`} class="text-blue-500 hover:underline">Bewerk</a>
		</li>
	{/each}
</ul>