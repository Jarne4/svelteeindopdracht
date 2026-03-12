<script>
	import { page } from "$app/stores";

    import { onMount } from "svelte";
	import { requireAdmin } from "$lib/utils/auth";

	onMount(() => {
		requireAdmin();
	});
    
	let afspraak = {};
	$: id = $page.params.id;

	async function load() {
		const res = await fetch(`http://localhost:8000/api/afspraken/${id}`);
		afspraak = await res.json();
	}

	async function save() {
		await fetch(`http://localhost:8000/api/afspraken/${id}`, {
			method: "PUT",
			headers: { "Content-Type": "application/json" },
			body: JSON.stringify(afspraak),
		});
		alert("Afspraak aangepast");
	}

	$: if (id) load();
</script>

<h1 class="text-2xl mb-4">Afspraak aanpassen (Klant)</h1>

<input bind:value={afspraak.naam} class="border p-2 block mb-2" />
<input bind:value={afspraak.email} class="border p-2 block mb-2" />
<input bind:value={afspraak.datum} type="date" class="border p-2 block mb-2" />
<input bind:value={afspraak.tijd} type="time" class="border p-2 block mb-2" />
<select bind:value={afspraak.dienst} class="border p-2 block mb-2">
	<option>Knippen</option>
	<option>Kleuren</option>
	<option>Kapper</option>
</select>
<textarea bind:value={afspraak.opmerking} class="border p-2 block mb-2"></textarea>

<button on:click={save} class="bg-blue-500 text-white px-4 py-2">Opslaan</button>