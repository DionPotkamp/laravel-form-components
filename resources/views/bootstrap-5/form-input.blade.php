@if($type === 'hidden') <div class="d-none"> @endif
@if($floating) <div class="form-floating"> @endif

    @if(!$floating)
        <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
    @endif

    <input
        {!! $attributes->merge(['class' => 'form-control' . ($hasError($name) ? ' is-invalid' : '')]) !!}

        type="{{ $type }}"

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @else
            name="{{ $name }}"
            value="{{ $value }}"
        @endif

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif

        {{--  Placeholder is required as of writing  --}}
        @if($floating && !$attributes->get('placeholder'))
            placeholder="&nbsp;"
        @endif
    />

    @if($floating)
        <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
    @endif

@if($floating) </div> @endif

{!! $help ?? null !!}

@if($hasErrorAndShow($name))
    <x-form-errors :name="$name" />
@endif

@if($type === 'hidden') </div> @endif