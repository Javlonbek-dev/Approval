<?php

namespace App\Filament\Resources\ActResource\Pages;

use App\Filament\Resources\ActResource;
use App\Models\Act;
use App\Models\Attach_Files;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CreateAct extends CreateRecord
{
    protected static string $resource = ActResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
    }

    protected function afterCreate(): void
    {
        $this->saveAttachFiles($this->record);
    }

    protected function saveAttachFiles(Act $act)
    {
        $files = $this->data['files'] ?? [];

        if (!empty($files)) {
            $actFolder = 'acts/' . $act->id;

            Storage::disk('public')->makeDirectory($actFolder);

            $fileDataArray = [];

            foreach ($files as $filePath) {
                $newFilePath = $actFolder . '/' . basename($filePath);

                Storage::disk('public')->move($filePath, $newFilePath);

                $fileDataArray[] = [
                    'file' => $newFilePath,
                ];
            }

            Attach_Files::create([
                'act_id' => $act->id,
                'file' => json_encode($fileDataArray),
            ]);
        } else {
            Log::info('No files uploaded.');
        }
    }
}
