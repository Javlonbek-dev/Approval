<?php

namespace App\Filament\Resources\ApplicationResource\Pages;

use App\Filament\Resources\ApplicationResource;
use App\Models\Application;
use App\Models\Attach_Files;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CreateApplication extends CreateRecord
{
    protected static string $resource = ApplicationResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
    }

    protected function afterCreate(): void
    {
        $this->saveAttachFiles($this->record);
    }

    protected function saveAttachFiles(Application $application)
    {
        $files = $this->data['files'] ?? [];

        if (!empty($files)) {
            $applicationFolder = 'uploads/applications/' . $application->id;

            Storage::disk('public')->makeDirectory($applicationFolder);

            $fileDataArray = [];

            foreach ($files as $filePath) {
                $newFilePath = $applicationFolder . '/' . basename($filePath);

                Storage::disk('public')->move($filePath, $newFilePath);

                $fileDataArray[] = [
                    'file' => $newFilePath,
                ];
            }

            Attach_Files::create([
                'application_id' => $application->id,
                'file' => json_encode($fileDataArray),
            ]);
        } else {
            Log::info('No files uploaded.');
        }
    }


}
