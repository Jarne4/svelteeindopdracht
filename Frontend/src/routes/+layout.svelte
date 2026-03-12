<script lang="ts">
	import './layout.css';
	import Navbar from "$lib/components/Navbar.svelte";
</script>

<Navbar />

<main class="p-6">
	<slot />
</main>