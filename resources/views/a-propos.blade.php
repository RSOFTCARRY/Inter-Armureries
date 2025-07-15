{{-- resources/views/a-propos.blade.php --}}
@extends('layouts.app')

@section('title', 'À propos')

@section('content')
<div class="container py-4">
    <h1>À propos</h1>

    <p>Bienvenue sur notre site. Nous sommes spécialisés dans la fabrication et la vente d’armes et de munitions, avec un engagement fort en matière de qualité, de légalité et de sécurité.</p>

    <h2>Notre mission</h2>
    <p>Offrir à nos clients des produits fiables, conformes à la réglementation française, tout en assurant un service personnalisé et professionnel.</p>

    <h2>Notre expertise</h2>
    <p>Avec plusieurs années d’expérience en armurerie, nous conseillons aussi bien les professionnels que les passionnés.</p>

    <h2>Nos engagements</h2>
    <ul>
        <li>Respect strict des normes légales (SIA, SIRET, traçabilité)</li>
        <li>Conseils sur-mesure selon le besoin client</li>
        <li>Confidentialité et protection des données</li>
        <li>Transparence et conformité administrative</li>
    </ul>

    <h2>Nous contacter</h2>
    <p>Pour toute information ou rendez-vous, contactez-nous à : contact@monsite.com</p>

    <p class="mt-4 text-muted"><small>Dernière mise à jour : juillet 2025</small></p>
</div>
@endsection
