<?php

use Webkernel\Component\Plugin\Tests\Fixtures\EssentialPlugin;
use Webkernel\Component\Plugin\Tests\Fixtures\Plugins\NoDefaultsTestPlugin;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Posts\PostResource;
use Webkernel\Component\Plugin\Tests\Fixtures\Resources\Users\UserResource;
use Filament\Facades\Filament;

beforeEach(function () {
    $this->panel = Filament::getCurrentOrDefaultPanel();
});
describe('Trait Delegation with Real Plugin Registration', function () {

    it('delegates HasLabels when used and fallbacks to defaults', function () {
        $this->panel
            ->plugins([
                EssentialPlugin::make(),
            ]);

        /** @var class-string<UserResource> $resource */
        $resource = $this->panel->getResources()[0];

        // expect($resource)->toBe(UserResource::class)
        //     ->and($resource::getModelLabel())->toBe('user')
        //     ->and($resource::getPluralModelLabel())->toBe('users')
        //     ->and($resource::getRecordTitleAttribute())->toBeNull()
        //     ->and($resource::hasTitleCaseModelLabel())->toBeTrue();

        expect($resource::getModelLabel())->toBe('Essential Item (Method)')
            ->and($resource::getPluralModelLabel())->toBe('Essential Items')
            ->and($resource::getRecordTitleAttribute())->toBe('id')
            ->and($resource::hasTitleCaseModelLabel())->toBeFalse();

        $this->panel
            ->plugins([
                EssentialPlugin::make()
                    ->modelLabel('Full Item')
                    ->pluralModelLabel('Full Items')
                    ->recordTitleAttribute('name')
                    ->titleCaseModelLabel(true),
            ]);

        /** @var class-string<UserResource> $resource */
        $resource = $this->panel->getResources()[0];

        expect($resource)->toBe(UserResource::class)
            ->and($resource::getModelLabel())->toBe('Full Item')
            ->and($resource::getPluralModelLabel())->toBe('Full Items')
            ->and($resource::getRecordTitleAttribute())->toBe('name')
            ->and($resource::hasTitleCaseModelLabel())->toBeTrue();
    });

    it('delegates to plugin when plugin has defaults', function () {

        $this->panel
            ->plugins([
                EssentialPlugin::make(),
            ]);
        $userResource = $this->panel->getResources()[0];

        // EssentialPlugin has no tenant defaults, so Filament defaults apply
        expect($userResource::getTenantRelationshipName())->toBe('users')
            ->and($userResource::getTenantOwnershipRelationshipName())->toBeEmpty();

        $this->panel
            ->plugins([
                EssentialPlugin::make()
                    ->tenantRelationshipName('organization')
                    ->tenantOwnershipRelationshipName('owner'),
            ]);

        $fullFeatureResource = $this->panel->getResources()[0];

        expect($fullFeatureResource::getTenantRelationshipName())->toBe('organization');
        expect($fullFeatureResource::getTenantOwnershipRelationshipName())->toBe('owner');
    });

    // it('falls back to Filament core when plugin has no defaults (BelongsToTenant)', function () {
    //     // Register plugin WITHOUT tenant defaults
    //     $panel = Filament::getCurrentOrDefaultPanel();
    //     $panel->plugins([
    //         NoDefaultsTestPlugin::make(),
    //     ]);

    //     // Should fall back to Filament's core logic which generates from model class
    //     // UserResource -> User model -> 'users' relationship name
    //     expect(UserResource::getTenantRelationshipName())->toBe('users');

    //     // Should fall back to Filament's getTenantOwnershipRelationshipName()
    //     // which returns the panel's default tenant ownership relationship name
    //     expect(UserResource::getTenantOwnershipRelationshipName())->toBeString();

    //     // Should fall back to Filament's default: true
    //     expect(UserResource::isScopedToTenant())->toBeTrue();
    // });

    // it('delegates to plugin when plugin has defaults (HasLabels)', function () {
    //     // Register plugin with label defaults
    //     $panel = Filament::getCurrentOrDefaultPanel();
    //     $panel->plugins([
    //         FullFeaturesTestPlugin::make(),
    //     ]);

    //     // This should use plugin's configured value: 'Full Item'
    //     expect(UserResource::getModelLabel())->toBe('Full Item');

    //     // This should use plugin's configured value: 'Full Items'
    //     expect(UserResource::getPluralModelLabel())->toBe('Full Items');

    //     // This should use plugin's configured value: 'title'
    //     expect(UserResource::getRecordTitleAttribute())->toBe('title');

    //     // This should use plugin's configured value: false
    //     expect(UserResource::hasTitleCaseModelLabel())->toBeFalse();
    // });

    // it('falls back to Filament core when plugin has no defaults (HasLabels)', function () {
    //     // Register plugin WITHOUT label defaults
    //     $panel = Filament::getCurrentOrDefaultPanel();
    //     $panel->plugins([
    //         NoDefaultsTestPlugin::make(),
    //     ]);

    //     // Should fall back to Filament's core logic which generates from model class
    //     // User model -> 'user' model label
    //     expect(UserResource::getModelLabel())->toBe('user');

    //     // User model -> 'users' plural model label
    //     expect(UserResource::getPluralModelLabel())->toBe('users');

    //     // Should fall back to Filament's default: null
    //     expect(UserResource::getRecordTitleAttribute())->toBeNull();

    //     // Should fall back to Filament's default: true
    //     expect(UserResource::hasTitleCaseModelLabel())->toBeTrue();
    // });

    // it('works correctly for different resource classes', function () {
    //     // Test with NoDefaults plugin to ensure Filament core fallback works for different models
    //     $panel = Filament::getCurrentOrDefaultPanel();
    //     $panel->plugins([
    //         NoDefaultsTestPlugin::make(),
    //     ]);

    //     // PostResource -> Post model -> 'posts' relationship name
    //     expect(PostResource::getTenantRelationshipName())->toBe('posts');

    //     // Post model -> 'post' model label
    //     expect(PostResource::getModelLabel())->toBe('post');

    //     // Post model -> 'posts' plural model label
    //     expect(PostResource::getPluralModelLabel())->toBe('posts');
    // });
});
