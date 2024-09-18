<?php

namespace App\Filament\Resources\ProgramResource\Pages;

use App\Filament\Resources\ProgramResource;
use App\Models\Attach_Files;
use App\Models\Program;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CreateProgram extends CreateRecord
{
    protected static string $resource = ProgramResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
    }

    protected function afterCreate(): void
    {
        $this->saveAttachFiles($this->record);
    }

    protected function saveAttachFiles(Program $program): void
    {
        $files = $this->data['files'] ?? [];

        if (!empty($files)) {
            $fileFolder = 'uploads/programs/' . $program->id;

            Storage::disk('public')->makeDirectory($fileFolder);

            $fileDataArray = [];

            foreach ($files as $filePath) {
                $newFilePath = $fileFolder . '/' . basename($filePath);

                Storage::disk('public')->move($filePath, $newFilePath);

                $fileDataArray[] = [
                    'file' => $newFilePath,
                ];
            }

            Attach_Files::create([
                'program_id' => $program->id,
                'file' => json_encode($fileDataArray),
            ]);
        } else {
            Log::info('No files uploaded.');
        }
    }
}
