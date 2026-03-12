<script>
import { onMount } from "svelte";
import { requireAdmin } from "$lib/utils/auth";
import { goto } from "$app/navigation";

let afspraken = []

let naamFilter = ""
let datumFilter = ""
let dienstFilter = ""

onMount(() => {

	const role = localStorage.getItem("role")

	if(role !== "admin"){
		goto("/")
	}

	requireAdmin()
	load()

})

async function load(){

let url = "http://localhost:8000/api/afspraken?"

if(naamFilter) url += `naam=${naamFilter}&`
if(datumFilter) url += `datum=${datumFilter}&`
if(dienstFilter) url += `dienst=${dienstFilter}`

const res = await fetch(url)
afspraken = await res.json()

}

async function verwijderen(id){

await fetch(`http://localhost:8000/api/afspraken/${id}`,{
method:"DELETE"
})

load()

}

</script>

<h1 class="text-3xl mb-6">Admin Dashboard</h1>

<!-- filters -->

<div class="flex gap-2 mb-4">

<input bind:value={naamFilter} placeholder="Naam" class="border p-2">

<input bind:value={datumFilter} type="date" class="border p-2">

<select bind:value={dienstFilter} class="border p-2">

<option value="">Alle diensten</option>
<option>Knippen</option>
<option>Kleuren</option>
<option>Kapper</option>

</select>

<button on:click={load} class="bg-green-500 text-white px-3">
Filter
</button>

</div>

<!-- lijst -->

{#each afspraken as afspraak}

<div class="border p-4 mb-2">

<h2 class="font-bold">{afspraak.naam}</h2>

<p>{afspraak.datum} {afspraak.tijd}</p>

<p>{afspraak.dienst}</p>

<p>{afspraak.opmerking}</p>

<div class="flex gap-2 mt-2">

<a href={`/admin/bewerken/${afspraak.id}`} class="bg-yellow-400 px-2 py-1">
Bewerken
</a>

<button on:click={()=>verwijderen(afspraak.id)} class="bg-red-500 text-white px-2 py-1">
Verwijderen
</button>

</div>

</div>

{/each}